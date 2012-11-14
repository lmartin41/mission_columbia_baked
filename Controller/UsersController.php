<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public $name = 'Users';
    public $components = array('Security');

    /**
     *
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Security->requireSecure(array('login'));
    }

    /**
     * Lee: Standard login method 
     * Redirects to users page right now (see AppController.php)
     */
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $user = $this->Auth->user();
                if ($user['isDeleted']) { //Prevent deleted users from logging in
                    $this->Auth->logout();
                    $this->Session->setFlash('Your account is no longer active');
                } else {
                    $this->redirect($this->Auth->redirect());
                }
            } else {
                $this->Session->setFlash('Your username/password combination was incorrect');
            }
        }
    }

    /**
     * Standard cakephp logout method 
     */
    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->check_privileges($this->Auth->user(), 'index');
        $conditions = array('cur_user' => $this->Auth->user());
        if (isset($this->params['url']['showAll'])) {
            $this->paginate = array('showDeletedToo', 'conditions' => $conditions);
            $this->set('hideDeleted', true);
        } else {
            $this->paginate = array('active', 'conditions' => $conditions);
            $this->set('hideDeleted', false);
        }
        $users = $this->paginate();
        $this->set(compact('users'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->check_privileges($this->Session->read('Auth.User'), 'view');
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        
        $this->set('doesFormExist', $this->User->VolunteerInformationForm->find('first', array('conditions' => array('user_id' => "$id"))));
        $this->set('user', $this->User->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->check_privileges($this->Session->read('Auth.User'), 'add');
        if ($this->request->is('post')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'index'));
                return;
            }
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        $organizations = $this->User->Organization->find('list');
        $this->set(compact('organizations'));
        $cur_user = $this->Auth->user();
        $this->set('optionalInputs', $this->User->getOptionalInputs($cur_user, true));
        $this->set('org_disabled', $this->User->organizationDisabled($cur_user));
        $this->set('selected_id', $cur_user['organization_id']);
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->check_privileges($this->Auth->user(), 'edit', $id);

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('controller' => 'clients', 'action' => 'index'));
                return;
            }
            if ($this->request->data['User']['password'] == '' && $this->request->data['User']['password_confirmation'] == '') {
                $this->User->set('username', $this->request->data['User']['username']);
                $this->User->set('email', $this->request->data['User']['email']);
                if (isset($this->request->data['User']['organization_id']))
                    $this->User->set('organization_id', $this->request->data['User']['organization_id']);
                if (isset($this->request->data['User']['isSuperAdmin']))
                    $this->User->set('isSuperAdmin', $this->request->data['User']['isSuperAdmin']);
                if (isset($this->request->data['User']['isAdmin']))
                    $this->User->set('isAdmin', $this->request->data['User']['isAdmin']);
                if (isset($this->request->data['User']['isDeleted']))
                    $this->User->set('isDeleted', $this->request->data['User']['isDeleted']);

                if ($this->User->validates(array('fieldList' => array('email')))) {
                    $this->User->save(null, array('validate' => false));
                    $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            } elseif ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            $this->request->data['User']['password'] = '';
        }
        $organizations = $this->User->Organization->find('list');
        $this->set(compact('organizations'));
        $cur_user = $this->Auth->user();
        $this->set('optionalInputs', $this->User->getOptionalInputs($cur_user));
        $this->set('org_disabled', $this->User->organizationDisabled($cur_user));
    }

    /**
     * delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->check_privileges($this->Auth->user(), 'delete', $id);
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        $this->User->set('isDeleted', 1);
        if ($this->User->save(null, array('validate' => false))) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    private function check_privileges($user, $action, $id = null) {
        $model_user = null;
        if ($id != null) {
            $model_user = $this->User->read(null, $id);
        }

        $valid = true;
        if (!$user['isAdmin'] && !$user['isSuperAdmin']) {
            if ($action == 'edit') {
                if ($user['id'] == $model_user['User']['id']) {
                    return true;
                }
            } else {
                $valid = false;
            }
        }

        if ($action == 'edit' || $action == 'delete') {
            //A user cannot edit or delete a user unless they have higher privileges than that user. 
            if ($user['isAdmin']) {
                if ($model_user['User']['isSuperAdmin']) {
                    $valid = false;
                } elseif ($model_user['User']['isAdmin']) {
                    if ($action == 'edit' && $model_user['User']['id'] != $user['id']) //A user can edit themself
                        $valid = false;
                    elseif ($action == 'delete') //A user cannot delete themself.
                        $valid = false;
                }
            }
        }

        if (!$valid) {
            $this->Session->setFlash(__('You do not have sufficient privileges to perform that action.'));
            if ($user['isAdmin'] || $user['isSuperAdmin'])
                $this->redirect(array('controller' => 'users', 'action' => 'index'));
            else
                $this->redirect(array('controller' => 'pages', 'action' => 'index'));
        }
    }

}

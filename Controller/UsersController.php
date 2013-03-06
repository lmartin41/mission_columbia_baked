<?php

App::uses('AppController', 'Controller');
App::uses('LoggersController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public $name = 'Users';
    public $components = array('Security', 'RequestHandler');

    /**
     *
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Security->requireSecure(array('login'));
    }

    public function isAuthorized($user) {
        $valid = true;

        //only admins and superAdmins can get to index, view, add, and delete.
        if (in_array($this->action, array('index', 'view', 'add', 'delete'))) {
            if (!($user['isAdmin'] || $user['isSuperAdmin'])) {
                $valid = false;
            }
        }

        if (in_array($this->action, array('edit', 'editPassword'))) {
            $userId = $this->params['pass'][0];

            $this->User->read(null, $userId);
            //admins and superAdmins can only edit profiles below their level
            //regular users can only edit their own profile
            if (!$this->User->hasLessPrivilege($user)) {
                if ($userId != $user['id']) {
                    $valid = false;
                }
            }

            //admins can only edit users in their organization
            elseif ($user['isAdmin']) {
                if (!$this->User->sameOrganization($user['organization_id'])) {
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

        return parent::isAuthorized($user);
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
        if (isset($this->params['url']['showAll'])) {
            $this->set('hideDeleted', true);
        } else {
            $this->set('hideDeleted', false);
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
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
        if ($this->request->is('post')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'index'));
                return;
            }
            $this->User->create();
            //this will allow the password to be hashed
            $this->request->data['User']['pwd'] = $this->request->data['User']['password'];

            $cur_user = $this->Auth->user();
            if (!$cur_user['isSuperAdmin']) {
                $this->request->data['User']['organization_id'] = $cur_user['organization_id'];
            }

            if ($this->User->save($this->request->data)) {

                //logging the add
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "users", "add", "Added user " . $this->request->data['User']['username']);


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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['cancel'])) {
                $cur_user = $this->Auth->user();
                if ($cur_user['isAdmin'] || $cur_user['isSuperAdmin']) {
                    $this->redirect(array('action' => 'view', $id));
                } else {
                    $this->redirect(array('controller' => 'clients', 'action' => 'index'));
                }
                return;
            }

            //this is just so the password match will be successfull but no new password will actually be saved
            $this->request->data['User']['password_confirmation'] = $this->User->data['User']['password'];
            if ($this->User->save($this->request->data)) {

                //logging the edit
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "users", "edit", "Edited user " . $this->request->data['User']['username']);

                $cur_user = $this->Auth->user();
                if ($cur_user['isAdmin'] || $cur_user['isSuperAdmin']) {
                    $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('action' => 'view', $id));
                } else {
                    $this->Session->setFlash(__('Your profile has been saved'));
                    $this->redirect(array('controller' => 'clients', 'action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }
        $organizations = $this->User->Organization->find('list');
        $this->set(compact('organizations'));
        $cur_user = $this->Auth->user();
        $this->set('optionalInputs', $this->User->getOptionalInputs($cur_user));
        $this->set('org_disabled', $this->User->organizationDisabled($cur_user));
    }

    public function editPassword($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['cancel'])) {
                $cur_user = $this->Auth->user();
                if ($cur_user['isAdmin'] || $cur_user['isSuperAdmin']) {
                    $this->redirect(array('action' => 'view', $id));
                } else {
                    $this->redirect(array('action' => 'edit', $cur_user['id']));
                }
                return;
            }

            //this will allow the password to be hashed
            $this->request->data['User']['pwd'] = $this->request->data['User']['password'];
            if ($this->User->save($this->request->data)) {

                //logging the edit
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "users", "editPassword", "Edited password for " . $this->request->data['User']['username']);

                $cur_user = $this->Auth->user();
                if ($cur_user['isAdmin'] || $cur_user['isSuperAdmin']) {
                    $this->Session->setFlash(__('The user\'s password has been saved'));
                    $this->redirect(array('action' => 'view', $id));
                } else {
                    $this->Session->setFlash(__('Your password has been saved'));
                    $this->redirect(array('action' => 'edit', $cur_user['id']));
                }
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);

            unset($this->request->data['User']['password']);
            unset($this->request->data['User']['password_confirmation']);
        }
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

            //logging the delete
            $lControl = new LoggersController();
            $userName = $this->User->read(null, $id);
            $userName = $userName['User']['username'];
            $lControl->add($this->Auth->user(), "users", "delete", "Deleted user " . $userName);

            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function dataTables() {
        $aColumns = array('User.username', 'Organization.org_name', 'User.email', 'User.isDeleted');
        $params = array();

        //Paging
        if (isset($this->params['url']['iDisplayStart']) && $this->params['url']['iDisplayLength'] != '-1') {
            $params['limit'] = $this->params['url']['iDisplayLength'];
            $params['offset'] = $this->params['url']['iDisplayStart'];
        }

        //Sorting
        if (isset($this->params['url']['iSortCol_0'])) {
            $order = array();
            for ($i = 0; $i < intval($this->params['url']['iSortingCols']); $i++) {
                if ($this->params['url']['bSortable_' . intval($this->params['url']['iSortCol_' . $i])] == "true") {
                    $order[] = $aColumns[intval($this->params['url']['iSortCol_' . $i])] . ' ' . $this->params['url']['sSortDir_' . $i];
                }
            }

            $params['order'] = $order;
        }

        //Filtering
        if (isset($this->params['url']['sSearch']) && $this->params['url']['sSearch'] != "") {
            $conditions = array('OR' => array());
            for ($i = 0; $i < count($aColumns); $i++) {
                if (isset($this->params['url']['bSearchable_' . $i]) &&
                        $this->params['url']['bSearchable_' . $i] == "true") {
                    $conditions['OR'][$aColumns[$i] . ' LIKE '] = $this->params['url']['sSearch'] . '%';
                }
            }
            $params['conditions'] = $conditions;
        }

        //Custom parameters
        $total_count_params = array();
        if (isset($this->params['url']['org_id']) && $this->params['url']['org_id'] != -1) {
            $params['conditions']['Organization.id'] = $this->params['url']['org_id'];
            $total_count_params['Organization.id'] = $this->params['url']['org_id'];
        }

        if (isset($this->params['url']['show_all']) && $this->params['url']['show_all'] == "false") {
            $params['conditions']['User.isDeleted'] = 0;
            $total_count_params['User.isDeleted'] = 0;
        }

        $params['fields'] = array('User.id', 'User.username', 'Organization.org_name', 'User.email', 'User.isDeleted');
        $params['recursive'] = 0;

        $raw_data = $this->User->find('all', $params);

        $total = $this->User->find('count', array('conditions' => $total_count_params));

        if (isset($params['conditions'])) {
            $filteredTotal = $this->User->find('count', array('conditions' => $params['conditions']));
        } else {
            $filteredTotal = $total;
        }

        $output = array(
            'sEcho' => intval($this->params['url']['sEcho']),
            'iTotalRecords' => $total,
            'iTotalDisplayRecords' => $filteredTotal,
            'aaData' => array()
        );

        foreach ($raw_data as $result) {
            $row = array(
                $result['User']['username'],
                $result['Organization']['org_name'],
                $result['User']['email'],
                $result['User']['isDeleted'],
                'DT_RowId' => 'user_' . $result['User']['id'],
            );

            if ($result['User']['isDeleted'] == 1) {
                $row['DT_RowClass'] = 'deleted';
            }

            $output['aaData'][] = $row;
        }
        $this->set('output', $output);
    }

}

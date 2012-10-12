<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
    
    public $name = 'Users';
    
    /**
     * FIXME: delete later - Lee
     */
    public function beforeFilter() {
        parent::beforeFilter();
    }
    
    /**
     * Lee: Standard login method 
     * Redirects to users page right now (see AppController.php)
     */
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            }
            
            else {
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
		$conditions = array('cur_user' => $this->Session->read("Auth.User"));
		$this->paginate = array('active', 'conditions' => $conditions);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
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
			if( $this->request->data['User']['password'] == '' && $this->request->data['User']['password_confirmation'] == '' )
			{
				$this->User->set('username', $this->request->data['User']['username']);
				$this->User->set('email', $this->request->data['User']['email']);
				if( isset($this->request->data['User']['organization_id']) )
					$this->User->set('organization_id', $this->request->data['User']['organization_id']);
				if( isset($this->request->data['User']['isSuperAdmin']) )
					$this->User->set('isSuperAdmin', $this->request->data['User']['isSuperAdmin']);
				if( isset($this->request->data['User']['isAdmin']) )
					$this->User->set('isAdmin', $this->request->data['User']['isAdmin']);
				if( isset($this->request->data['User']['isDeleted']) )
					$this->User->set('isDeleted', $this->request->data['User']['isDeleted']);
				
				if($this->User->validates(array('fieldList' => array('email'))))
				{
					$this->User->save(NULL, array('validate' => false));
					$this->Session->setFlash(__('The user has been saved'));
					$this->redirect(array('action' => 'index'));
				}
				else
				{
					$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
				}
			}
			elseif ($this->User->save($this->request->data)) {
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
		$this->set('org_disabled', $this->User->organizationDisabled($this->Session->read("Auth.User")));
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
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

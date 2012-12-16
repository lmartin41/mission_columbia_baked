<?php

App::uses('AppController', 'Controller');
App::uses('LoggersController', 'Controller');

/**
 * Feedbacks Controller
 *
 * @property Feedback $Feedback
 */
class FeedbacksController extends AppController {

	
	public function beforeFilter()
	{
		parent::beforeFilter();
	}
	
	public function isAuthorized($user)
	{
		if( !$user['isSuperAdmin']  && $this->action != "add" )
		{
			$this->Session->setFlash(__('You do not have permission to view that page'));
			return false;
		}
		
		return parent::isAuthorized($user);
	}
	
    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Feedback->recursive = 0;
        $this->set('feedbacks', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Feedback->id = $id;
        if (!$this->Feedback->exists()) {
            throw new NotFoundException(__('Invalid feedback'));
        }
        $this->set('feedback', $this->Feedback->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $auth_user = $this->Auth->user();
        $this->set('selected_id', $auth_user['id']);
        
        if ($this->request->is('post')) {
            
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('controller' => 'clients', 'action' => 'index'));
            }
            
            $this->request->data['Feedback']['user_id'] = $auth_user['id'];
            $this->Feedback->create();
            if ($this->Feedback->save($this->request->data)) {
                
                //logging the add
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "feedacks", "add", "Left feedback");
                
                $this->Session->setFlash(__('The feedback has been saved'));
                $this->redirect(array('controller' => 'clients', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The feedback could not be saved. Please, try again.'));
            }
        }
        $users = $this->Feedback->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Feedback->id = $id;
        if (!$this->Feedback->exists()) {
            throw new NotFoundException(__('Invalid feedback'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'index'));
            }
            
            if ($this->Feedback->save($this->request->data)) {
                
                //logging the edit
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "feedacks", "edit", "Edited feedback");
                
                $this->Session->setFlash(__('The feedback has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The feedback could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Feedback->read(null, $id);
        }
        $users = $this->Feedback->User->find('list');
        $this->set(compact('users'));
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
        $this->Feedback->id = $id;
        if (!$this->Feedback->exists()) {
            throw new NotFoundException(__('Invalid feedback'));
        }
        
        //feedbacks will be permanently deleted -- no reason to hang onto them
        if ($this->Feedback->delete()) {
                //logging the delete
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "feedacks", "delete", "Deleted feedback");
            
            
            $this->Session->setFlash(__('Feedback deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Feedback was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}

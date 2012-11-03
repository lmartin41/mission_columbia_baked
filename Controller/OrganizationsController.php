<?php

App::uses('AppController', 'Controller');
App::uses('ClientsController', 'Controller');

/**
 * Organizations Controller
 *
 * @property Organization $Organization
 */
class OrganizationsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
	
	public $components = array('RequestHandler');
	
    public function index() {
        $this->Organization->recursive = 0;
        $this->set('organizations', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Organization->id = $id;
        if (!$this->Organization->exists()) {
            throw new NotFoundException(__('Invalid organization'));
        }
        $this->set('organization', $this->Organization->read(null, $id));
        
        $path = ClientsController::giveMePath('Organization', $id);
        $this->set('imagePath', $path);
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
            }
            $this->Organization->create();
            if ($this->Organization->save($this->request->data)) {
                $this->Session->setFlash(__('The Organization has been saved'));
                $this->Session->write('organizationID', $this->Organization->id);
                if (isset($this->request->data['addMore'])) {
                    $this->redirect(array('controller' => 'Resources', 'action' => 'add', $this->Organization->id));
                } else if (isset($this->request->data['finished'])) {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The client could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Organization->id = $id;
        if (!$this->Organization->exists()) {
            throw new NotFoundException(__('Invalid organization'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Organization->save($this->request->data)) {
                $this->Session->setFlash(__('The organization has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The organization could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Organization->read(null, $id);
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
        $this->Organization->id = $id;
        if (!$this->Organization->exists()) {
            throw new NotFoundException(__('Invalid organization'));
        }
        if ($this->Organization->delete()) {
            $this->Session->setFlash(__('Organization deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Organization was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function resources($id = null)
    {
    	$this->Organization->id = $id;
    	if (!$this->Organization->exists()) {
    		throw new NotFoundException(__('Invalid organization'));
    	}
    	$org = $this->Organization->read(null, $id);
    	$this->set('organization_resources', $org['Resource']);
    }
    
    /**
     * Lee: Report functions 
     */
    public function count() {
        return $this->Organization->find('count');
    }

}

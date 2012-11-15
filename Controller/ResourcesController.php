<?php
App::uses('OrganizationsController', 'Controller');
App::uses('AppController', 'Controller');
App::uses('ClientsController', 'Controller');

/**
 * Resources Controller
 *
 * @property Resource $Resource
 */
class ResourcesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {

        $orgCont = new OrganizationsController();
        $result = $orgCont->giveMeAddresses();

        $this->set('theResult', $result);

        $this->Resource->recursive = 0;
        $this->set('resources', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Resource->id = $id;
        if (!$this->Resource->exists()) {
            throw new NotFoundException(__('Invalid resource'));
        }
        $this->set('resource', $this->Resource->read(null, $id));
        
        $path = ClientsController::giveMePath('Resource', $id);
        $this->set('imagePath', $path);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($organizationID = null) {
        if ($this->request->is('post')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'index'));
            }
            $this->request->data['Resource']['organization_id'] = $organizationID;
            $this->Resource->create();
            if ($this->Resource->save($this->request->data)) {
                $this->Session->setFlash(__('The resource has been saved'));
                if (isset($this->request->data['Add_another_resource'])) {
                    $this->redirect(array('action' => 'add', $organizationID));
                } else if (isset($this->request->data['finished'])) {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The resource could not be saved. Please, try again.'));
            }
        }
        //read from the database; point resource to the database
        $this->set('resource', $this->Resource->read(null, $id));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null, $organizationID = null) {
        $this->Resource->id = $id;
        $this->set('organizationID', $organizationID);
        if (!$this->Resource->exists()) {
            throw new NotFoundException(__('Invalid resource'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'index'));
            }
            if ($this->Resource->save($this->request->data)) {
                $this->Session->setFlash(__('The resource has been saved'));
                if (isset($this->request->data['finished'])) {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The resource could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Resource->read(null, $id);
        }
        $resources = $this->Resource->Organization->find('list');
        $this->set(compact('resources'));
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
        $this->Resource->id = $id;
        if (!$this->Resource->exists()) {
            throw new NotFoundException(__('Invalid resource'));
        }
        if ($this->Resource->delete()) {
            $this->Session->setFlash(__('Resource deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Resource was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
    
    public function giveMeName($resourceID) {
        $query = $this->Resource->query("
            Select resource_name
            From resources
            Where id = '$resourceID'
        ");
        return $query[0]['resources']['resource_name'];
    }

    /**
     * Lee: Report functions 
     */
    public function count() {
        return $this->Resource->find('count');
    }

}

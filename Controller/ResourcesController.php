<?php

App::uses('OrganizationsController', 'Controller');
App::uses('AppController', 'Controller');
App::uses('ClientsController', 'Controller');
App::uses('LoggersController', 'Controller');

/**
 * Resources Controller
 *
 * @property Resource $Resource
 */
class ResourcesController extends AppController {

    public $uses = array("Resource", "Client");

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

        $resource = $this->Resource->read(null, $id);
        $this->set('resource', $resource);
        $resourceUseWithClientName = array();
        $i = 0;
        foreach ($resource['ResourceUs'] as $resourceUse) {
            $clientID = $resourceUse['client_id'];
            $clientName = $this->Client->query("Select first_name, last_name from clients where id = $clientID");
            $resourceUseWithClientName[$i]['clientName'] = $clientName[$i]['clients']['first_name'] . " " . $clientName[$i]['clients']['last_name'];
            $resourceUseWithClientName[$i]['date'] = $resourceUse['date'];
            $resourceUseWithClientName[$i]['comments'] = $resourceUse['comments'];
            $resourceUseWithClientName[$i]['id'] = $resourceUse['id'];
        }

        $this->set('resourceUse', $resourceUseWithClientName);
        $path = ClientsController::giveMePath('Resource', $id);
        $this->set('imagePath', $path);
        $this->set('remotePath', preg_quote("'" . APP . 'webroot' . DS . 'uploaded_images' . "'"));
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

                //logging the adding of a resource
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "resources", "add", "Added Resource " . $this->request->data['Resource']['resource_name']);

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

                //logging the editing of a resource
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "resources", "edit", "Edited Resource " . $this->request->data['Resource']['resource_name']);

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
        $resourceName = $this->Resource->read(null, $id);
        $resourceName = $resourceName['Resource']['resource_name'];

        if (!$this->Resource->exists()) {
            throw new NotFoundException(__('Invalid resource'));
        }
        if ($this->Resource->delete()) {

            //logging the deleting of a resource
            $lControl = new LoggersController();
            $lControl->add($this->Auth->user(), "resources", "delete", "Deleted Resource " . $resourceName);

            $this->Session->setFlash(__('Resource deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Resource was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * Lee: Report functions 
     */
    public function count() {
        return $this->Resource->find('count');
    }

}

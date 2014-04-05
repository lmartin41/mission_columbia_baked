<?php

App::uses('AppController', 'Controller');
App::uses('ClientsController', 'Controller');
App::uses('LoggersController', 'Controller');

/**
 * Organizations Controller
 *  Make a function that 
 * @property Organization $Organization
 */
class OrganizationsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public $components = array('RequestHandler');
    public $uses = array("Organization", "Resource");

    public function index() {
        $this->Organization->recursive = 0;
        $this->set('organizations', $this->paginate('Organization', 'Organization.isDeleted = 0'));
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
        $this->set('remotePath', preg_quote("'" . APP . 'webroot' . DS . 'uploaded_images' . "'"));
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

                //logging the add
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "organizations", "add", "Added organization " . $this->request->data['Organization']['org_name']);

                $this->Session->setFlash(__('The Organization has been saved'));
                $this->Session->write('organizationID', $this->Organization->id);
                if (isset($this->request->data['addMore'])) {
                    $this->redirect(array('controller' => 'Resources', 'action' => 'add', $this->Organization->id));
                } else if (isset($this->request->data['finished'])) {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The organization could not be saved. Please, try again.'));
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
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'view', $id));
            }

            if ($this->Organization->save($this->request->data)) {

                //logging the edit
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "organizations", "edit", "Edited organization " . $this->request->data['Organization']['org_name']);

                $this->Session->setFlash(__('The organization has been saved'));
                if (isset($this->request->data['finished'])) {
                    $this->redirect(array('action' => 'view', $id));
                } else {
                    $this->Session->setFlash(__('The organization could not be saved. Please, try again.'));
                }
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
        $orgName = $this->Organization->read(null, $id);
        $orgName = $orgName['Organization']['org_name'];

        if (!$this->Organization->exists()) {
            throw new NotFoundException(__('Invalid organization'));
        }
        $this->Organization->set('isDeleted', 1);
        if ($this->Organization->save()) {

            //need to also delete all the organization's resources
            $resources = $this->Resource->find('all', array(
                'conditions' => array(
                    'organization_id' => $id)
                    ));
            $i = 0;
            foreach ($resources as $resource) {
                $resourceID = $resource['Resource']['id'];
                $this->Resource->query("
                UPDATE resources
                SET `isDeleted` =  '1' 
                WHERE id = '$resourceID'");
            }

            //logging the delete
            $lControl = new LoggersController();
            $lControl->add($this->Auth->user(), "organizations", "delete", "Deleted organization " . $orgName);

            $this->Session->setFlash(__('Organization deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Organization was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function resources($id = null) {
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

    public function giveMeUniqueResources() {
        return $this->Organization->Resource->query("
            Select distinct resource_name
            From resources
            ");
    }

}

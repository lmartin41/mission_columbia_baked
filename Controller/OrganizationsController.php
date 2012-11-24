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
                $this->redirect(array('action' => 'index'));
            }
            if ($this->Organization->save($this->request->data)) {
                
                //logging the edit
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "organizations", "edit", "Edited organization " . $this->request->data['Organization']['org_name']);
                
                $this->Session->setFlash(__('The organization has been saved'));
                if (isset($this->request->data['finished'])) {
                    $this->redirect(array('action' => 'index'));
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
        if ($this->Organization->delete()) {
            
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

    /**
     * 2d array
     * need an array of all addresses separated by address_one, City, and state
     */
    public function giveMeAddresses() {
        $retVal = array();
        $query = $this->Organization->query("
            
            Select id, org_name, address_one, city, state, zip
            From organizations
            
            ");

        for ($i = 0; $i < count($query); $i++) {
            $orgID = $query[$i]['organizations']['id'];
            $query2 = $this->Organization->query("
                
                Select id, organization_id, resource_name, street_address, city, state, zip
                From resources
                Where organization_id = '$orgID'

                ;");

            $retVal[$i] = array(
                'id' => $query[$i]['organizations']['id'],
                'org_name' => $query[$i]['organizations']['org_name'],
                'org_address' => $query[$i]['organizations']['address_one'] . ", " . $query[$i]['organizations']['city']
                . ", " . $query[$i]['organizations']['state'] . ", " . $query[$i]['organizations']['zip'],
                'resources' => array()
            );
  
            for ($j = 0; $j < count($query2); $j++) {
                $retVal[$i]['resources'][$j] = array(
                    'id' => $query2[$j]['resources']['id'],
                    'organization_id' => $query2[$j]['resources']['organization_id'],
                    'rOrgName' => $query[$i]['organizations']['org_name'],
                    'resource_name' => $query2[$j]['resources']['resource_name'],
                    'resource_address' => $query2[$j]['resources']['street_address'] . ", " . $query2[$j]['resources']['city']
                    . ", " . $query2[$j]['resources']['state'] . ", " . $query2[$j]['resources']['zip']
                );
            }
        }
        return $retVal;
    }

    public function giveMeUniqueResources(){
        return $this->Organization->Resource->query("
            Select distinct resource_name
            From resources
            ");
    }

}

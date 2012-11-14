<?php

App::uses('AppController', 'Controller');

/**
 * Resourceuses Controller
 *
 * @property Resourceus $Resourceus
 */
class ResourceUsesController extends AppController {
	public $uses = array("ResourceUs", "Organization", "Resource");
    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->ResourceUs->recursive = 0;
        $this->set('resourceuses', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->ResourceUs->id = $id;
        if (!$this->ResourceUs->exists()) {
            throw new NotFoundException(__('Invalid resource use'));
        }
        $this->set('resourceUs', $this->ResourceUs->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($clientID = null) {
    	
        if ($this->request->is('post')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('controller' => 'clients', 'action' => 'index'));
            }
            $this->request->data['ResourceUs']['client_id'] = $clientID;
            $this->ResourceUs->create();
            $this->ResourceUs->client_id = $clientID;
            if ($this->ResourceUs->save($this->request->data)) {
                $this->Session->setFlash(__('The resource use has been saved'));
                if (isset($this->request->data['Add_another_resource'])) {
                    $this->redirect(array('action' => 'add', $clientID));
                } else if (isset($this->request->data['finished'])) {
                    $this->redirect(array('controller' => 'clients', 'action' => 'view', $clientID));
                }
            } else {
                $this->Session->setFlash(__('The resource use could not be saved. Please, try again.'));
            }
        }
        $clients = $this->ResourceUs->Client->find('list');
        $organizations = $this->Organization->find('list');
        $this->set(compact('clients', 'organizations'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->ResourceUs->id = $id;
        if (!$this->ResourceUs->exists()) {
            throw new NotFoundException(__('Invalid resource use'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ResourceUs->save($this->request->data)) {
                $this->Session->setFlash(__('The resource use has been saved'));
                $this->redirect(array('controller' => 'clients', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The resource use could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->ResourceUs->read(null, $id);
        }
        $clients = $this->ResourceUs->Client->find('list');
        $organizations = $this->Organization->find('list');
        $selected_organization = $this->request->data['Resource']['organization_id'];
        $resources = $this->Resource->find('list', array( 'conditions' => array('Resource.organization_id' => $selected_organization)));
        $selected_resource = $this->request->data['Resource']['id'];
        $this->set(compact('clients', 'organizations', 'resources'));
        $this->set('selected_organization', $selected_organization);
        $this->set('selected_resource', $selected_resource);
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
        $this->ResourceUs->id = $id;
        if (!$this->ResourceUs->exists()) {
            throw new NotFoundException(__('Invalid resourceus'));
        }
        if ($this->ResourceUs->delete()) {
            $this->Session->setFlash(__('Resource use deleted'));
            $this->redirect(array('controller' => 'clients', 'action' => 'index'));
        }
        $this->Session->setFlash(__('Resource use was not deleted'));
        $this->redirect(array('controller' => 'clients', 'action' => 'index'));
    }

    /**
     * Lee: Report functions 
     */
    public function countPeriod($startDate, $endDate, $sex) {
        $query = $this->ResourceUse->query("
                Select count(DISTINCT resource_uses.id) as period
                From resource_uses join clients
                Where $sex AND date between '$startDate' AND '$endDate';
            ");
        return $query[0][0]['period'];
    }

    public function mostPopular() {
        $query = $this->ResourceUse->query(
                "Select max(counts) as mostPopular from (
                    select resource_name as counts from resource_uses 
                    join resources on resource_id 
                    group by resource_id) as derived;
                 ");
        return $query[0][0]['mostPopular'];
    }

    public function countParticular($resourceID, $startDate, $endDate) {
       $query = $this->ResourceUse->query("
                Select count(resource_id) as count
                From resource_uses
                Where resource_id = '$resourceID' AND date between '$startDate' and '$endDate';
            ");
        return $query[0][0]['count'];
    }
    
    public function mostPopularClient($resourceID, $startDate, $endDate) {
        $query = $this->ResourceUse->query("
               Select max(counts) as mostPopular from (
                    select first_name as counts from clients
                    join resource_uses on client_id 
                    where resource_uses.resource_id = '$resourceID' AND date between '$startDate' and '$endDate'
                    group by clients.id) as derived;
               ");
        return $query[0][0]['mostPopular'];
    }

}

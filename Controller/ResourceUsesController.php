<?php

App::uses('AppController', 'Controller');

/**
 * Resourceuses Controller
 *
 * @property Resourceus $Resourceus
 */
class ResourceUsesController extends AppController {
	public $uses = "ResourceUs";
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
            throw new NotFoundException(__('Invalid ResourceUs'));
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
                $this->Session->setFlash(__('The Resource Use has been saved'));
                if (isset($this->request->data['Add_another_resource'])) {
                    $this->redirect(array('action' => 'add', $clientID));
                } else if (isset($this->request->data['finished'])) {
                    $this->redirect(array('controller' => 'clients', 'action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The resuorce use could not be saved. Please, try again.'));
            }
        }
        $clients = $this->ResourceUs->Client->find('list');
        $resources = $this->ResourceUs->Resource->find('list');
        $this->set(compact('clients', 'resources'));
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
            throw new NotFoundException(__('Invalid ResourceUs'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ResourceUs->save($this->request->data)) {
                $this->Session->setFlash(__('The resource Use has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The ResourceUs could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->ResourceUs->read(null, $id);
        }
        $clients = $this->ResourceUs->Client->find('list');
        $resources = $this->ResourceUs->Resource->find('list');
        $this->set(compact('clients', 'resources'));
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
            $this->Session->setFlash(__('Resource Use deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Resourceus was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * Lee: Report functions 
     */
    public function count() {
        return $this->ResourceUs->find('count');
    }
    
    public function countPeriod($startDate, $endDate) {
        $query = $this->ResourceUs->query("
                Select count(*)
                From resource_uses
                Where date between '$startDate' AND '$endDate';
            ");
    }

    public function mostPopular() {
        $query = $this->ResourceUs->query(
                "Select max(counts) as mostPopular from (
                    select resource_name as counts from resource_uses 
                    join resources on resource_id 
                    group by resource_id) as derived;
                 ");
        return $query[0][0]['mostPopular'];
    }

    public function countParticular($resourceID = null, $startDate, $endDate) {
        $query = $this->ResourceUs->query("
                Select count(resource_id) as count
                From resource_uses
                Where resource_id = '$resourceID' AND date between '$startDate' and '$endDate';
            ");
        return $query[0][0]['count'];
    }
    
    public function mostPopularClient($resourceID = null, $startDate, $endDate) {
        $query = $this->ResourceUs->query("
               Select max(counts) as mostPopular from (
                    select first_name as counts from clients
                    join resource_uses on client_id 
                    where resource_uses.resource_id = '$resourceID' AND date between '$startDate' and '$endDate'
                    group by clients.id) as derived;
               ");
        return $query[0][0]['mostPopular'];
    }

}

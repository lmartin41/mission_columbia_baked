<?php

App::uses('AppController', 'Controller');

/**
 * Resourceuses Controller
 *
 * @property Resourceus $Resourceus
 */
class ResourceusesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Resourceus->recursive = 0;
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
        $this->Resourceus->id = $id;
        if (!$this->Resourceus->exists()) {
            throw new NotFoundException(__('Invalid resourceus'));
        }
        $this->set('resourceus', $this->Resourceus->read(null, $id));
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
            $this->request->data['Resourceus']['client_id'] = $clientID;
            $this->Resourceus->create();
            $this->Resourceus->client_id = $clientID;
            if ($this->Resourceus->save($this->request->data)) {
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
        $clients = $this->Resourceus->Client->find('list');
        $resources = $this->Resourceus->Resource->find('list');
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
        $this->Resourceus->id = $id;
        if (!$this->Resourceus->exists()) {
            throw new NotFoundException(__('Invalid resourceus'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Resourceus->save($this->request->data)) {
                $this->Session->setFlash(__('The resource Use has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The resourceus could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Resourceus->read(null, $id);
        }
        $clients = $this->Resourceus->Client->find('list');
        $resources = $this->Resourceus->Resource->find('list');
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
        $this->Resourceus->id = $id;
        if (!$this->Resourceus->exists()) {
            throw new NotFoundException(__('Invalid resourceus'));
        }
        if ($this->Resourceus->delete()) {
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
        return $this->Resourceus->find('count');
    }

    public function mostPopular() {
        $query = $this->Resourceus->query(
                "Select max(counts) as mostPopular from (
                    select resource_name as counts from resource_uses 
                    join resources on resource_id 
                    group by resource_id) as derived;
                 ");
        return $query[0][0]['mostPopular'];
    }

    public function countParticular($resourceID = null, $startDate, $endDate) {
        $query = $this->Resourceus->query("
                Select count(resource_id) as count
                From resource_uses
                Where resource_id = '$resourceID' AND date between '$startDate' and '$endDate';
            ");
        return $query[0][0]['count'];
    }
    
    public function mostPopularClient($resourceID = null, $startDate, $endDate) {
        $query = $this->Resourceus->query("
               Select max(counts) as mostPopular from (
                    select first_name as counts from clients
                    join resource_uses on client_id 
                    where resource_uses.resource_id = '$resourceID' AND date between '$startDate' and '$endDate'
                    group by clients.id) as derived;
               ");
        return $query[0][0]['mostPopular'];
    }

}

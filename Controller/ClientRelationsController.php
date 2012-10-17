<?php

App::uses('AppController', 'Controller');

/**
 * ClientRelations Controller
 *
 * @property ClientRelation $ClientRelation
 */
class ClientRelationsController extends AppController {
    
    /**
     * index method
     *
     * @return void
     */
    public function index($clientID = null) {
        $this->ClientRelation->recursive = 0;
        $this->set('clientRelations', $this->paginate());
        $this->set('clientID', $clientID);
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->ClientRelation->id = $id;
        if (!$this->ClientRelation->exists()) {
            throw new NotFoundException(__('Invalid client relation'));
        }
        
        $this->set('clientRelation', $this->ClientRelation->read(null, $id));
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
            $this->request->data['ClientRelation']['client_id'] = $clientID;
            $this->ClientRelation->create();
            if ($this->ClientRelation->save($this->request->data)) {
                $this->Session->setFlash(__('The client relation has been saved'));
                if (isset($this->request->data['Add_another_relative'])) {
                    $this->redirect(array('action' => 'add', $clientID));
                } else if (isset($this->request->data['finished'])) {
                    $this->redirect(array('controller' => 'clients', 'action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The client relation could not be saved. Please, try again.'));
            }
        }
        $clients = $this->ClientRelation->Client->find('list');
        $this->set(compact('clients'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null, $clientID = null) {
        $this->ClientRelation->id = $id;
        
        $this->set('clientID', $clientID);
        if (!$this->ClientRelation->exists()) {
            throw new NotFoundException(__('Invalid client relation'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'index', $clientID));
            }
            if ($this->ClientRelation->save($this->request->data)) {
                $this->Session->setFlash(__('The client relation has been saved'));
                if (isset($this->request->data['finished'])) {
                    $this->redirect(array('action' => 'index', $clientID));
                }
            } else {
                $this->Session->setFlash(__('The client relation could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->ClientRelation->read(null, $id);
        }
        $clients = $this->ClientRelation->Client->find('list');
        $this->set(compact('clients'));
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
        $clientID = $this->Session->read('clientID');
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->ClientRelation->id = $id;
        if (!$this->ClientRelation->exists()) {
            throw new NotFoundException(__('Invalid client relation'));
        }
        if ($this->ClientRelation->delete()) {
            $this->Session->setFlash(__('Client relation deleted'));
            $this->redirect(array('action' => 'index', $clientID));
        }
        $this->Session->setFlash(__('Client relation was not deleted'));
        $this->redirect(array('action' => 'index', $clientID));
    }

}

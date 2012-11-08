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
            throw new NotFoundException(__('Invalid client Relative'));
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
                $this->Session->setFlash(__('The client Relative has been saved'));
                if (isset($this->request->data['Add_another_relative'])) {
                    $this->redirect(array('action' => 'add', $clientID));
                } else if (isset($this->request->data['finished'])) {
                    $this->redirect(array('controller' => 'clients', 'action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The client Relative could not be saved. Please, try again.'));
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
                $this->redirect(array('controller' => 'clients', 'action' => 'index'));
            }
            $this->request->data['ClientRelation']['client_id'] = $clientID;
            if ($this->ClientRelation->save($this->request->data)) {
                $this->Session->setFlash(__('The client Relative has been saved'));
                if (isset($this->request->data['finished'])) {
                    $this->redirect(array('controller' => 'clients', 'action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The client Relative could not be saved. Please, try again.'));
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
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->ClientRelation->id = $id;
        if (!$this->ClientRelation->exists()) {
            throw new NotFoundException(__('Invalid client Relative'));
        }
        if ($this->ClientRelation->delete()) {
            $this->Session->setFlash(__('Client Relative deleted'));
            $this->redirect(array('controller' => 'clients', 'action' => 'index'));
        }
        $this->Session->setFlash(__('Client Relative was not deleted'));
        $this->redirect(array('controller' => 'clients', 'action' => 'index'));
    }

}

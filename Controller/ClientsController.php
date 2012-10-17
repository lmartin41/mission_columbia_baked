<?php

App::uses('AppController', 'Controller');

/**
 * Clients Controller
 *
 * @property Client $Client
 */
class ClientsController extends AppController {
    
    public $helpers = array('Js');
    
    /**
     * index method
     *
     * @return void
     */
    public function index() {
         if ($this->request->is('post')) {
            $results = $this->Client->find('all');
            $correctResults = null;
            $lastName = $this->request->data['Client']['last_name'];
            $firstName = $this->request->data['Client']['first_name'];
            foreach ($results as $current) {
                if ($current['Client']['first_name'] == $firstName && $current['Client']['last_name'] == $lastName) {
                    $correctResults = $current;
                }
            }
            $this->Session->write('results', $correctResults);
            $this->redirect(array('action' => 'searchResults'));
        }
    }
    
    public function browse() {
        $this->Client->recursive = 0;
        $this->set('clients', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Client->id = $id;
        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }
        $this->set('client', $this->Client->read(null, $id));
    }

    /**
     * Lee: This method searches for a client 
     */
    public function search() {
        if ($this->request->is('post')) {
            $results = $this->Client->find('all');
            $correctResults = null;
            $lastName = $this->request->data['Client']['last_name'];
            $firstName = $this->request->data['Client']['first_name'];
            foreach ($results as $current) {
                if ($current['Client']['first_name'] == $firstName && $current['Client']['last_name'] == $lastName) {
                    $correctResults = $current;
                }
            }
            $this->Session->write('results', $correctResults);
            $this->redirect(array('action' => 'searchResults'));
        }
    }

    /**
     * Lee: This method displays the results of the above search 
     */
    public function searchResults() {
       $results = $this->Session->read('results');
       $this->set('results', $results);
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
            $this->Client->create();
            if ($this->Client->save($this->request->data)) {
                $this->Session->setFlash(__('The client details have been saved'));
                if (isset($this->request->data['addMore'])) {
                    $this->redirect(array('controller' => 'client_relations', 'action' => 'add', $this->Client->id));
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
        $this->Client->id = $id;
        if (!$this->Client->exists()) {
            $this->Session->setFlash('This client does not exist.  Please create him now');
            $this->redirect(array('action' => 'add'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'index'));
            }
            if ($this->Client->save($this->request->data)) {
                $this->Session->setFlash(__('The client has been edited'));
                if (isset($this->request->data['editMore'])) {
                    $this->redirect(array('controller' => 'client_relations', 'action' => 'index', $id));
                } else if (isset($this->request->data['finished'])) {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The client could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Client->read(null, $id);
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
        $this->Client->id = $id;
        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }
        if ($this->Client->delete()) {
            $this->Session->setFlash(__('Client deleted'));
            $this->redirect(array('action' => 'browse'));
        }
        $this->Session->setFlash(__('Client was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}

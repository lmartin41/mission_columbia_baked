<?php

App::uses('AppController', 'Controller');

/**
 * Lookups Controller
 *
 * @property Lookup $Lookup
 */
class LookupsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Lookup->recursive = 0;
        $this->set('lookups', $this->paginate());
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $current_user = $this->Auth->user();
            $this->request->data['Lookup']['organization_id'] = $current_user['organization_id'];
            $this->Lookup->create();
            if ($this->Lookup->save($this->request->data)) {
                $this->Session->setFlash(__('The lookup has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The lookup could not be saved. Please, try again.'));
            }
        }
        $organizations = $this->Lookup->Organization->find('list');
        $this->set(compact('organizations'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Lookup->id = $id;
        if (!$this->Lookup->exists()) {
            throw new NotFoundException(__('Invalid lookup'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $current_user = $this->Auth->user();
            $this->request->data['Lookup']['organization_id'] = $current_user['organization_id'];
            if ($this->Lookup->save($this->request->data)) {
                $this->Session->setFlash(__('The lookup has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The lookup could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Lookup->read(null, $id);
        }
        $organizations = $this->Lookup->Organization->find('list');
        $this->set(compact('organizations'));
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
        $this->Lookup->id = $id;
        if (!$this->Lookup->exists()) {
            throw new NotFoundException(__('Invalid lookup'));
        }
        if ($this->Lookup->delete()) {
            $this->Session->setFlash(__('Lookup deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Lookup was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}

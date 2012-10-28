<?php

App::uses('AppController', 'Controller');

/**
 * ClientChecklists Controller
 *
 * @property ClientChecklist $ClientChecklist
 */
class ClientChecklistsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index($clientID = null) {
        $this->ClientChecklist->recursive = 0;
        $this->set('client', $this->ClientChecklist->Client->read(null, $clientID));
        $this->set('clientChecklists', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->ClientChecklist->id = $id;
        if (!$this->ClientChecklist->exists()) {
            throw new NotFoundException(__('Invalid client checklist'));
        }
        $this->set('clientChecklist', $this->ClientChecklist->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($clientID = null) {
        $this->request->data['ClientChecklist']['client_id'] = $clientID;
        $this->ClientChecklist->create();
        if ($this->ClientChecklist->save($this->request->data)) {
            $this->Session->setFlash(__('The client checklist has been saved'));
            $this->redirect(array('action' => 'index', $clientID));
        } else {
            $this->Session->setFlash(__('The client checklist could not be saved. Please, try again.'));
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
        $this->ClientChecklist->id = $id;
        if (!$this->ClientChecklist->exists()) {
            throw new NotFoundException(__('Invalid client checklist'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ClientChecklist->save($this->request->data)) {
                $this->Session->setFlash(__('The client checklist has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The client checklist could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->ClientChecklist->read(null, $id);
        }
        $clients = $this->ClientChecklist->Client->find('list');
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
        $this->ClientChecklist->id = $id;
        if (!$this->ClientChecklist->exists()) {
            throw new NotFoundException(__('Invalid client checklist'));
        }
        if ($this->ClientChecklist->delete()) {
            $this->Session->setFlash(__('Client checklist deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Client checklist was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}

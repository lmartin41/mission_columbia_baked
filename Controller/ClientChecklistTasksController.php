<?php

App::uses('AppController', 'Controller');

/**
 * ClientChecklistTasks Controller
 *
 * @property ClientChecklistTask $ClientChecklistTask
 */
class ClientChecklistTasksController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->ClientChecklistTask->recursive = 0;
        $this->set('clientChecklistTasks', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null, $clientID = null) {
        $this->set('clientID', $clientID);
        $this->ClientChecklistTask->id = $id;
        if (!$this->ClientChecklistTask->exists()) {
            throw new NotFoundException(__('Invalid client checklist task'));
        }
        $this->set('clientChecklistTask', $this->ClientChecklistTask->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($clientChecklistID = null) {
        $this->set('clientChecklistID', $clientChecklistID);
        $clientChecklist = $this->ClientChecklistTask->ClientChecklist->read(null, $clientChecklistID);
        if ($this->request->is('post')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('controller' => 'clientChecklists', 'action' => 'index', $clientChecklist['ClientChecklist']['client_id']));
            }
            $this->request->data['ClientChecklistTask']['client_checklist_id'] = $clientChecklistID;
            $this->ClientChecklistTask->create();
            if ($this->ClientChecklistTask->save($this->request->data)) {
                $this->Session->setFlash(__('The client checklist task has been saved'));
                if (isset($this->request->data['Add_another_task'])) {
                    $this->redirect(array('controller' => 'ClientChecklistTasks', 'action' => 'add', $clientChecklistID));
                } else if (isset($this->request->data['finished'])) {
                    
                    $this->redirect(array('controller' => 'ClientChecklists', 'action' => 'index', $clientChecklist['ClientChecklist']['client_id']));
                }
            } else {
                $this->Session->setFlash(__('The client checklist task could not be saved. Please, try again.'));
            }
        }

        //finding current checklist tasks
        $clientChecklistTasks = $this->ClientChecklistTask->find('all', array(
            'conditions' => array(
                'client_checklist_id' => $clientChecklistID,
            )
        ));
        $this->set('clientChecklistTasks', $clientChecklistTasks);
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null, $clientID = null) {
        $this->set('clientID', $clientID);
        $this->ClientChecklistTask->id = $id;
        if (!$this->ClientChecklistTask->exists()) {
            throw new NotFoundException(__('Invalid client checklist task'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ClientChecklistTask->save($this->request->data)) {
                $this->Session->setFlash(__('The client checklist task has been saved'));
                $this->redirect(array('controller' => 'ClientChecklists', 'action' => 'index', $clientID));
            } else {
                $this->Session->setFlash(__('The client checklist task could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->ClientChecklistTask->read(null, $id);
        }
        $clientChecklists = $this->ClientChecklistTask->ClientChecklist->find('list');
        $this->set(compact('clientChecklists'));
    }

    /**
     * delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null, $clientID) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->ClientChecklistTask->id = $id;
        if (!$this->ClientChecklistTask->exists()) {
            throw new NotFoundException(__('Invalid client checklist task'));
        }
        $this->ClientChecklistTask->set('isDeleted', 1);
        if ($this->ClientChecklistTask->save()) {
            $this->Session->setFlash(__('Client checklist task deleted'));
            $this->redirect(array('controller' => 'ClientChecklists', 'action' => 'index', $clientID));
        }
        $this->Session->setFlash(__('Client checklist task was not deleted'));
        $this->redirect(array('controller' => 'ClientChecklists', 'action' => 'index', $clientID));
    }

}

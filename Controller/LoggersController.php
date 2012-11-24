<?php

App::uses('AppController', 'Controller');

/**
 * Loggers Controller
 *
 * @property Logger $Logger
 */
class LoggersController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        if ($this->request->is('post')) {
            $this->set('startDate', $this->request->data['startDate']);
            $this->set('endDate', $this->request->data['endDate']);
            $this->set('showDiv', true);
            $this->Logger->recursive = 0;
            $this->set('loggers', $this->paginate());
        }

        else $this->set('showDiv', false);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($user, $controller, $action, $description) {
        $this->Logger->create();
        $data = array();
        $data['Logger']['user_id'] = $user['id'];
        $data['Logger']['controller'] = $controller;
        $data['Logger']['action'] = $action;
        $data['Logger']['description'] = $description;
        $this->Logger->save($data);
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
        $this->Logger->id = $id;
        if (!$this->Logger->exists()) {
            throw new NotFoundException(__('Invalid log'));
        }
        if ($this->Logger->delete()) {
            $this->Session->setFlash(__('Log deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Log was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}

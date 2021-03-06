<?php

App::uses('AppController', 'Controller');

/**
 * Loggers Controller
 *
 * @property Logger $Logger
 */
class LoggersController extends AppController {

    public $users = array('Logger', 'User');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        if ($this->request->is('post')) {
            $this->redirect(array('action' => 'logs',
                $this->request->data['startDate'], $this->request->data['endDate']));
        }
    }

    public function logs($startDate = null, $endDate = null) {
        $this->Logger->recursive = 0;
        $current_user = $this->Auth->user();
        
        $conditions = array(
            'organizations.id' => $current_user['organization_id'],
            "Logger.created BETWEEN '$startDate' AND '$endDate'"
        );

        if ($current_user['isSuperAdmin']) {
            $conditions = array(
                "Logger.created BETWEEN '$startDate' AND '$endDate'"
            );
        }

        $this->paginate = array(
            'conditions' => $conditions,
            'joins' => array(
                array(
                    'table' => 'users',
                    'conditions' => 'Logger.user_id = users.id'
                ),
                array(
                    'table' => 'organizations',
                    'type' => 'LEFT',
                    'conditions' => 'users.organization_id = organizations.id'
                ),
            ),
        );

        $this->set('loggers', $this->paginate($this->Logger));
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

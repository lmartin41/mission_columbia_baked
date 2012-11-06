<?php

App::uses('AppController', 'Controller');

/**
 * PrayerRequests Controller
 *
 * @property PrayerRequest $PrayerRequest
 */
class PrayerRequestsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index($clientID = null) {

        $this->PrayerRequest->recursive = 0;
        $this->set('client', $this->PrayerRequest->Client->read(null, $clientID));
        $this->set('prayerRequests', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null, $clientID = null) {
        $this->PrayerRequest->id = $id;
        if (!$this->PrayerRequest->exists()) {
            throw new NotFoundException(__('Invalid prayer request'));
        }
        $this->set('prayerRequest', $this->PrayerRequest->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($clientID = null) {
        $this->set('clientID', $clientID);
        if ($this->request->is('post')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'index', $clientID));
            }
            $this->request->data['PrayerRequest']['client_id'] = $clientID;
            $this->PrayerRequest->create();
            if ($this->PrayerRequest->save($this->request->data)) {
                $this->Session->setFlash(__('The prayer request has been saved'));
                $this->redirect(array('action' => 'index', $clientID));
            } else {
                $this->Session->setFlash(__('The prayer request could not be saved. Please, try again.'));
            }
        }
        $clients = $this->PrayerRequest->Client->find('list');
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
        $this->PrayerRequest->id = $id;
        if (!$this->PrayerRequest->exists()) {
            throw new NotFoundException(__('Invalid prayer request'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'index', $clientID));
            }
            if ($this->PrayerRequest->save($this->request->data)) {
                $this->Session->setFlash(__('The prayer request has been saved'));
                $this->redirect(array('action' => 'index', $clientID));
            } else {
                $this->Session->setFlash(__('The prayer request could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->PrayerRequest->read(null, $id);
        }
        $clients = $this->PrayerRequest->Client->find('list');
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
    public function delete($id = null, $clientID = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->PrayerRequest->id = $id;
        if (!$this->PrayerRequest->exists()) {
            throw new NotFoundException(__('Invalid prayer request'));
        }
        if ($this->PrayerRequest->delete()) {
            $this->Session->setFlash(__('Prayer request deleted'));
            $this->redirect(array('action' => 'index', $clientID));
        }
        $this->Session->setFlash(__('Prayer request was not deleted'));
        $this->redirect(array('action' => 'index', $clientID));
    }

}
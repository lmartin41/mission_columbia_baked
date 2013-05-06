<?php

App::uses('AppController', 'Controller');
App::uses('LoggersController', 'Controller');

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
        $current_user = $this->Auth->user();
        $this->paginate = array(
            'conditions' => array(
                'PrayerRequest.isDeleted' => false,
                'PrayerRequest.organization_id' => $current_user['organization_id'],
                'PrayerRequest.client_id' => $clientID
            )
        );
        $this->set('prayerRequests', $this->paginate($this->PrayerRequest));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null, $clientID = null) {
        $this->check_privileges($this->Auth->user(), $id, $clientID);
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
                
                //logging the add
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "Prayer Requests", "add", "Added Prayer Request");
                
                $this->Session->setFlash(__('The prayer request has been saved'));
                $this->redirect(array('action' => 'index', $clientID));
            } else {
                $this->Session->setFlash(__('The prayer request could not be saved. Please, try again.'));
            }
        }
        $organizations = $this->PrayerRequest->Organization->find('list');
        $this->set(compact('organizations'));
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
                $this->redirect(array('action' => 'view', $id, $clientID));
            }
            if ($this->PrayerRequest->save($this->request->data)) {
                
                //logging the save
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "Prayer Requests", "edit", "Edited Prayer Request");
                
                $this->Session->setFlash(__('The prayer request has been saved'));
                $this->redirect(array('action' => 'view', $id, $clientID));
            } else {
                $this->Session->setFlash(__('The prayer request could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->PrayerRequest->read(null, $id);
        }
        $clients = $this->PrayerRequest->Client->find('list');
        $this->set(compact('clients'));
        $this->set('clientID', $clientID);
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
        $this->PrayerRequest->set('isDeleted', 1);
        if ($this->PrayerRequest->save()) {
            //logging the delete
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "Prayer Requests", "delete", "Deleted Prayer Request");
            
            $this->Session->setFlash(__('Prayer request deleted'));
            $this->redirect(array('action' => 'index', $clientID));
        }
        $this->Session->setFlash(__('Prayer request was not deleted'));
        $this->redirect(array('action' => 'index', $clientID));
    }

    private function check_privileges($currentUser, $requestID, $clientID) {
        $valid = true;
        $prayerRequest = $this->PrayerRequest->read(null, $requestID);
        $organizationIdOfRequest = $prayerRequest['PrayerRequest']['organization_id'];
        if ($currentUser['organization_id'] != $organizationIdOfRequest)
            $valid = false;

        if (!$valid) {
            $this->Session->setFlash(__('Sorry, prayer requests are private -- users of organizations can only view their own organization\'s prayer requests'));
            $this->redirect(array('action' => 'index', $clientID));
        }
    }

}

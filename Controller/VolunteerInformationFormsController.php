<?php

App::uses('AppController', 'Controller');

/**
 * VolunteerInformationForms Controller
 *
 * @property VolunteerInformationForm $VolunteerInformationForm
 */
class VolunteerInformationFormsController extends AppController {

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->VolunteerInformationForm->id = $id;
        if (!$this->VolunteerInformationForm->exists()) {
            throw new NotFoundException(__('Invalid volunteer information form'));
        }
        $this->set('volunteerInformationForm', $this->VolunteerInformationForm->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($userID = null) {
        if ($this->request->is('post')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('controller' => 'users', 'action' => 'index'));
            }
            $this->request->data['VolunteerInformationForm']['user_id'] = $userID;
            $this->VolunteerInformationForm->create();
            if ($this->VolunteerInformationForm->save($this->request->data)) {
                $this->Session->setFlash(__('The volunteer information form has been saved'));
                $this->redirect(array('controller' => 'users', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The volunteer information form could not be saved. Please, try again.'));
            }
        }
        $users = $this->VolunteerInformationForm->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->VolunteerInformationForm->id = $id;
        if (!$this->VolunteerInformationForm->exists()) {
            throw new NotFoundException(__('Invalid volunteer information form'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('controller' => 'users', 'action' => 'index'));
            }
            if ($this->VolunteerInformationForm->save($this->request->data)) {
                $this->Session->setFlash(__('The volunteer information form has been saved'));
                $this->redirect(array('controller' => 'users', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('The volunteer information form could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->VolunteerInformationForm->read(null, $id);
        }
        $users = $this->VolunteerInformationForm->User->find('list');
        $this->set(compact('users'));
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
        $this->VolunteerInformationForm->id = $id;
        if (!$this->VolunteerInformationForm->exists()) {
            throw new NotFoundException(__('Invalid volunteer information form'));
        }
        if ($this->VolunteerInformationForm->delete()) {
            $this->Session->setFlash(__('Volunteer information form deleted'));
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }
        $this->Session->setFlash(__('Volunteer information form was not deleted'));
        $this->redirect(array('controller' => 'users', 'action' => 'index'));
    }

}

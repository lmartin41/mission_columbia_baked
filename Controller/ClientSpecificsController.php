<?php
App::uses('AppController', 'Controller');
/**
 * ClientSpecifics Controller
 *
 * @property ClientSpecific $ClientSpecific
 */
class ClientSpecificsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ClientSpecific->recursive = 0;
		$this->set('clientSpecifics', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ClientSpecific->id = $id;
		if (!$this->ClientSpecific->exists()) {
			throw new NotFoundException(__('Invalid client specific'));
		}
		$this->set('clientSpecific', $this->ClientSpecific->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClientSpecific->create();
			if ($this->ClientSpecific->save($this->request->data)) {
				$this->Session->setFlash(__('The client specific has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client specific could not be saved. Please, try again.'));
			}
		}
		$clients = $this->ClientSpecific->Client->find('list');
		$this->set(compact('clients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ClientSpecific->id = $id;
		if (!$this->ClientSpecific->exists()) {
			throw new NotFoundException(__('Invalid client specific'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ClientSpecific->save($this->request->data)) {
				$this->Session->setFlash(__('The client specific has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client specific could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ClientSpecific->read(null, $id);
		}
		$clients = $this->ClientSpecific->Client->find('list');
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
		$this->ClientSpecific->id = $id;
		if (!$this->ClientSpecific->exists()) {
			throw new NotFoundException(__('Invalid client specific'));
		}
		if ($this->ClientSpecific->delete()) {
			$this->Session->setFlash(__('Client specific deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Client specific was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

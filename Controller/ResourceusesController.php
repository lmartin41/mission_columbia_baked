<?php
App::uses('AppController', 'Controller');
/**
 * Resourceuses Controller
 *
 * @property Resourceus $Resourceus
 */
class ResourceusesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Resourceus->recursive = 0;
		$this->set('resourceuses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Resourceus->id = $id;
		if (!$this->Resourceus->exists()) {
			throw new NotFoundException(__('Invalid resourceus'));
		}
		$this->set('resourceus', $this->Resourceus->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Resourceus->create();
			if ($this->Resourceus->save($this->request->data)) {
				$this->Session->setFlash(__('The resourceus has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resourceus could not be saved. Please, try again.'));
			}
		}
		$clients = $this->Resourceus->Client->find('list');
		$resources = $this->Resourceus->Resource->find('list');
		$this->set(compact('clients', 'resources'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Resourceus->id = $id;
		if (!$this->Resourceus->exists()) {
			throw new NotFoundException(__('Invalid resourceus'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Resourceus->save($this->request->data)) {
				$this->Session->setFlash(__('The resourceus has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resourceus could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Resourceus->read(null, $id);
		}
		$clients = $this->Resourceus->Client->find('list');
		$resources = $this->Resourceus->Resource->find('list');
		$this->set(compact('clients', 'resources'));
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
		$this->Resourceus->id = $id;
		if (!$this->Resourceus->exists()) {
			throw new NotFoundException(__('Invalid resourceus'));
		}
		if ($this->Resourceus->delete()) {
			$this->Session->setFlash(__('Resourceus deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Resourceus was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

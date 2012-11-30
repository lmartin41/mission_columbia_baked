<?php
App::uses('AppController', 'Controller');
/**
 * ResourceTypes Controller
 *
 * @property ResourceType $ResourceType
 */
class ResourceTypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ResourceType->recursive = 0;
		$this->set('resourceTypes', $this->paginate());
	}



/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ResourceType->create();
			if ($this->ResourceType->save($this->request->data)) {
				$this->Session->setFlash(__('The resource type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resource type could not be saved. Please, try again.'));
			}
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
		$this->ResourceType->id = $id;
		if (!$this->ResourceType->exists()) {
			throw new NotFoundException(__('Invalid resource type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ResourceType->save($this->request->data)) {
				$this->Session->setFlash(__('The resource type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resource type could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ResourceType->read(null, $id);
		}
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
		$this->ResourceType->id = $id;
		if (!$this->ResourceType->exists()) {
			throw new NotFoundException(__('Invalid resource type'));
		}
		if ($this->ResourceType->delete()) {
			$this->Session->setFlash(__('Resource type deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Resource type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

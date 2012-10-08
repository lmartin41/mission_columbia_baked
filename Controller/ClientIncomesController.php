<?php
App::uses('AppController', 'Controller');
/**
 * ClientIncomes Controller
 *
 * @property ClientIncome $ClientIncome
 */
class ClientIncomesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ClientIncome->recursive = 0;
		$this->set('clientIncomes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ClientIncome->id = $id;
		if (!$this->ClientIncome->exists()) {
			throw new NotFoundException(__('Invalid client income'));
		}
		$this->set('clientIncome', $this->ClientIncome->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ClientIncome->create();
			if ($this->ClientIncome->save($this->request->data)) {
				$this->Session->setFlash(__('The client income has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client income could not be saved. Please, try again.'));
			}
		}
		$clients = $this->ClientIncome->Client->find('list');
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
		$this->ClientIncome->id = $id;
		if (!$this->ClientIncome->exists()) {
			throw new NotFoundException(__('Invalid client income'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ClientIncome->save($this->request->data)) {
				$this->Session->setFlash(__('The client income has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client income could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->ClientIncome->read(null, $id);
		}
		$clients = $this->ClientIncome->Client->find('list');
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
		$this->ClientIncome->id = $id;
		if (!$this->ClientIncome->exists()) {
			throw new NotFoundException(__('Invalid client income'));
		}
		if ($this->ClientIncome->delete()) {
			$this->Session->setFlash(__('Client income deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Client income was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

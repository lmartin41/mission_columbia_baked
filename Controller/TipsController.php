<?php
App::uses('AppController', 'Controller');
/**
 * Tips Controller
 *
 * @property Tip $Tip
 */
class TipsController extends AppController {

	public $components = array('Auth', 'RequestHandler');
	
	
	public function beforeFilter()
	{
		$this->Auth->authorize = 'controller';
		parent::beforeFilter();
	}
	
	public function isAuthorized($user)
	{
		if( !($user['isSuperAdmin'] || $user['isAdmin']) )
		{
			return false;
		}
		
		return parent::isAuthorized($user);
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$cur_user = $this->Auth->user();
		$conditions = array();
		if( $cur_user['isAdmin'] )
		{
			$conditions['Tip.controller NOT '] = 'Global';
		}
		
		$this->paginate = array('conditions' => $conditions);
		$this->set('tips', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Tip->id = $id;
		if (!$this->Tip->exists()) {
			throw new NotFoundException(__('Invalid tip'));
		}
		$this->set('tip', $this->Tip->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		
		//These will be modified if there is an error while it is being saved
		$options = array(
			'controller' => array('type' => 'select', 'label' => 'Controller:', 'empty' => 'Select a controller', 'id' => 'controller'),
			'view' => array('type' => 'select', 'label' => 'View:', 'empty' => 'Select a view', 'disabled' => 'true', 'id' => 'view'),
			'organization_id' => array()
		);
		
		if ($this->request->is('post')) {
			$this->Tip->create();
			
			//need to massage the request data a bit
			$data = $this->request->data;
			
			$controllerIsGood = false;
			$viewIsGood = false;
			if( isset($data['Tip']['controller']) && $data['Tip']['controller'] != '' )
			{
				$data['Tip']['controller'] = $this->pageCatalog['controllers'][$data['Tip']['controller']];
				$controllerIsGood = true;
			}
			
			if( $controllerIsGood && isset($data['Tip']['view']) && $data['Tip']['view'] != '' )
			{
				$data['Tip']['view'] = $this->pageCatalog['views'][$data['Tip']['controller']][$data['Tip']['view']];
				$viewIsGood = true;
			}
			
			if( ! isset($data['Tip']['organization_id']) )
			{
				$cur_user = $this->Auth->user();
				$data['Tip']['organization_id'] = $cur_user['organization_id'];
			}

			if ($this->Tip->save($data)) {
				$this->Session->setFlash(__('The tip has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tip could not be saved. Please, try again.'));
				if( $controllerIsGood )
				{
					$con = $this->pageCatalog['controllers'][$this->data['Tip']['controller']];
					$this->set('views', $this->pageCatalog['views'][$con]);
					unset($options['controller']['empty']);
					unset($options['view']['disabled']);
				}
			}
		}
		
		$cur_user = $this->Auth->user();
		
		if( ! $cur_user['isSuperAdmin'] )
		{
			$rem = -1;
			$i = 0;
			foreach( $this->pageCatalog['controllers'] as $controller )
			{
				if($controller == 'Global')
				{
					$rem = $i;
				}
				$i++;
			}
			unset($this->pageCatalog['controllers'][$rem]);
			$options['organization_id']['type'] = 'hidden';
			$options['organization_id']['value'] = $cur_user['organization_id'];
		}
		else
		{
			$organizations = $this->Tip->Organization->find('list');
			$this->set(compact('organizations'));
		}
		
		$this->set('controllers', $this->pageCatalog['controllers']);
		$this->set('options', $options);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Tip->id = $id;
		if (!$this->Tip->exists()) {
			throw new NotFoundException(__('Invalid tip'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$cur_user = $this->Auth->user();
			if( $cur_user['isAdmin']
					&& $this->pageCatalog['controllers'][$this->request->data['controller']] == 'Global')
			{
				$this->Session->setFlash(__('You do not have permission to update a global tip.'));
				$this->redirect(array('action' => 'index'));
			}
			
			if ($this->Tip->save($this->request->data)) {
				$this->Session->setFlash(__('The tip has been saved'));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The tip could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Tip->read(null, $id);
		}
		$organizations = $this->Tip->Organization->find('list');
		$this->set(compact('organizations'));
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
		$this->Tip->id = $id;
		if (!$this->Tip->exists()) {
			throw new NotFoundException(__('Invalid tip'));
		}
		if ($this->Tip->delete()) {
			$this->Session->setFlash(__('Tip deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tip was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function checkExistence()
	{
		if( ! (isset($this->params['url']['organization_id']) && isset($this->params['url']['controller'])
				&& isset($this->params['url']['view'])) )
		{
			$result = array(
					'Error' => array(
						'message' => 'The correct parameters where not given. Must have organization_id, controller, and view.',
						'time' => date('G:i:s', time())
					)
				);
		}
		else
		{
			$organization_id = $this->params['url']['organization_id'];
			$controller = $this->pageCatalog['controllers'][$this->params['url']['controller']];
			$view = $this->pageCatalog['views'][$controller][$this->params['url']['view']];
			
			$conditions = array('AND' => array(
					'organization_id' => $organization_id,
					'controller' => $controller,
					'view' => $view
			));
			
			$result = $this->Tip->find('first', array('conditions' => $conditions));
			unset($result['Organization']);
		}
		
		$this->set('result', $result);
	}
}

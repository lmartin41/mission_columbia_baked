<?php

App::uses('AppController', 'Controller');
App::uses('ResourcesController', 'Controller');

/**
 * Clients Controller
 *
 * @property Client $Client
 */
class ClientsController extends AppController {
    public $uses = array('Client', 'Resource');
    public $components = array('Session', 'RequestHandler');
    public $helpers = array('Js');
    public $paginate = array(
        'order' => array(
            'last_name' => 'asc'
        )
    );

    /**
     * index method
     *
     * @return void
     */
    public function index() {
    	$this->Client->recursive = 0;
    	$this->set('clients', $this->paginate());
    }
    
    public function dataTables()
    {
    	$aColumns = array('Client.first_name', 'Client.last_name', 'Client.DOB');
    	$params = array();
    	
    	//Paging
    	if( isset($this->params['url']['iDisplayStart']) && $this->params['url']['iDisplayLength'] != '-1' )
    	{
    		$params['limit'] = $this->params['url']['iDisplayLength'];
    		$params['offset'] = $this->params['url']['iDisplayStart'];
    	}
    	
    	//Sorting
    	if( isset($this->params['url']['iSortCol_0']) )
    	{
    		$order = array();
    		for( $i=0; $i < intval($this->params['url']['iSortingCols']); $i++ )
    		{
    			if( $this->params['url']['bSortable_'.intval($this->params['url']['iSortCol_'.$i])] == "true" )
    			{
    				$order[] = $aColumns[intval($this->params['url']['iSortCol_'.$i])] . ' ' . $this->params['url']['sSortDir_'.$i];
    			}
    		}
    		
    		$params['order'] = $order;
    	}
    	
    	//Filtering
    	if ( isset($this->params['url']['sSearch']) && $this->params['url']['sSearch'] != "" )
    	{
    		$comma = strpos($this->params['url']['sSearch'], ',');
    		$space = strpos($this->params['url']['sSearch'], ' ');
    		
    		if( $comma === false && $space === false )
    		{
	    		$conditions = array('OR' => array());
	    		for ( $i=0; $i < count($aColumns); $i++ )
	    		{
	    			if( isset($this->params['url']['bSearchable_'.$i]) && 
	    					$this->params['url']['bSearchable_'.$i] == "true" )
	    			{
	    				$conditions['OR'][$aColumns[$i] . ' LIKE '] = $this->params['url']['sSearch'] . '%';
	    			}
	    		}
    		}
    		else
    		{
    			if($comma !== false)
    			{
    				$firstName = trim(substr($this->params['url']['sSearch'], $comma + 1));
    				$lastName = trim(substr($this->params['url']['sSearch'], 0, $comma));
    			}
    			else
    			{
    				$firstName = trim(substr($this->params['url']['sSearch'], 0, $space));
    				$lastName = trim(substr($this->params['url']['sSearch'], $space + 1));
    			}
    			
    			$conditions = array(
    					$aColumns[0] . ' LIKE ' => $firstName . '%', 
    					$aColumns[1] . ' LIKE ' => $lastName . '%'
    					);
    		}
    		
    		$params['conditions'] = $conditions;
    	}
    	
    	$raw_data = $this->Client->find('all', $params);
    	
    	$total = $this->Client->find('count');
    	
    	if( isset($params['conditions']) )
    	{
    		$filteredTotal = $this->Client->find('count', array( 'conditions' => $params['conditions']));
    	}
    	else
    	{
    		$filteredTotal = $total;
    	}
    	
    	$output = array(
    			'sEcho' => intval($this->params['url']['sEcho']),
    			'iTotalRecords' => $total,
    			'iTotalDisplayRecords' => $filteredTotal,
    			'aaData' => array()
    			);
    	
    	foreach( $raw_data as $result )
    	{
    		$row = array(
    				$result['Client']['first_name'], 
    				$result['Client']['last_name'], 
    				date('m/d/Y', strtotime(h($result['Client']['DOB']))),
    				'DT_RowId' => 'client_' . $result['Client']['id']
    				);
    		$output['aaData'][] = $row;
    	}
    	$this->set('output', $output);
    }
    
    //No longer needed - Brett Koenig
    public function clientSearch($firstName, $lastName) {
        if (empty($lastName)) {
            $conditions = array('OR' => array('first_name LIKE ' => $firstName . '%', 'last_name LIKE ' => $firstName . '%'));
        } else {
            $conditions = array('first_name LIKE ' => $firstName . '%', 'last_name LIKE ' => $lastName . '%');
        }

        return $this->Client->find('all', array('conditions' => $conditions));
    }

    //No longer needed - Brett Koenig
    public function browse() {
        $this->Client->recursive = 0;
        $this->set('clients', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Client->id = $id;
        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }

        $client = $this->Client->read(null, $id);
        $resourceUses = array();
        $resourceName = array();
        $organizationName = array();

        $i = 0;
        foreach ($client['ResourceUs'] as $resourceUse) {
            if ($resourceUse['client_id'] == $client['Client']['id']) {
                $resourceUses[$i] = $resourceUse;
                $num = $resourceUse['resource_id'];
                $resource = $this->Resource->find('first', array('conditions' => array('Resource.id' => $num)));
                $resourceName[$i] = $resource['Resource']['resource_name'];
                $organizationName[$i] = $resource['Organization']['org_name'];
                $i++;
            }
        }

        $this->set('resourceUses', $resourceUses);
        $this->set('resourceName', $resourceName);
        $this->set('organizationName', $organizationName);
        $this->set('client', $client);
        
        $path = $this->giveMePath('client', $id);
        $this->set('imagePath', $path);
        $this->set('remotePath', preg_quote("'" . APP . 'webroot' . DS . 'uploaded_images' . "'"));
    }
    
    /**
     * Lee: This function is for determining the path for image uploading
     * 
     * @param type $id
     * @return string 
     */
    public static function giveMePath($name, $id) {
        $path1 = APP . 'webroot' . DS . 'uploaded_images' . DS . $name . "-"  . $id . '.jpg';
        $path2 = APP . 'webroot' . DS . 'uploaded_images' . DS . $name . "-"  . $id . '.png';
        $path = "person.png";
        
        if (file_exists($path1)) {
            $path = "/uploaded_images/".$name."-".$id.".jpg";
        }
        else if (file_exists($path2)) {
            $path = "/uploaded_images/".$name."-".$id.".png";;
        }

        return $path;
    }

    /**
     * Lee: This method displays the results of the above search 
     */
    public function searchResults() {
        $this->set('results', $this->Session->read('results'));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'index'));
            }
            $this->Client->create();
            if ($this->Client->save($this->request->data)) {
                $this->Session->setFlash(__('The client details have been saved'));
                if (isset($this->request->data['addMore'])) {
                    $this->redirect(array('controller' => 'client_relations', 'action' => 'add', $this->Client->id));
                } else if (isset($this->request->data['finished'])) {
                    $this->redirect(array('action' => 'browse'));
                }
            } else {
                $this->Session->setFlash(__('The client could not be saved. Please, try again.'));
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
        $this->set('clientID', $id);
        $this->Client->id = $id;

        if (!$this->Client->exists()) {
            $this->Session->setFlash('This client does not exist.  Please create him now');
            $this->redirect(array('action' => 'add'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'view', $id));
            }
            if ($this->Client->save($this->request->data)) {
                $this->Session->setFlash(__('The client has been edited'));
                if (isset($this->request->data['finished'])) {
                    $this->redirect(array('action' => 'view', $id));
                }
            } else {
                $this->Session->setFlash(__('The client could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Client->read(null, $id);
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
        $this->Client->id = $id;
        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }
        if ($this->Client->delete()) {
            $this->Session->setFlash(__('Client deleted'));
            $this->redirect(array('action' => 'browse'));
        }
        $this->Session->setFlash(__('Client was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * Lee: Report functions 
     */
    public function count($startDate) {
        return $this->Client->find('count');
    }

    public function age($sex) {
        $query = $this->Client->query("Select avg(datediff(curdate(), DOB)) as avgage from clients Where $sex;");
        return round($query[0][0]['avgage'] / 365, 2, PHP_ROUND_HALF_DOWN);
    }

    public function sexCount() {
        $retVal = array();
        $query1 = $this->Client->query("Select count(sex) as numMen from clients where sex = 'M';");
        $query2 = $this->Client->query("Select count(sex) as numWomen from clients where sex = 'W';");
        $retVal[0] = $query1[0][0]['numMen'];
        $retVal[1] = $query2[0][0]['numWomen'];
        return $retVal;
    }

    public function avgIncome($sex) {
        $query = $this->Client->query("
                
            Select sum(regular_job + food_stamps + veterans_pension + part_time_job + social_security + 
            annuity_check + child_support + ssi_or_disability + unemployment) as summation from clients
            Where $sex
                
            ;");
        return $query[0][0]['summation'] / $this->count();
    }

    public function status($sex) {
        $retVal = array();
        //FIXME: obviously this is not optimal
        $query1 = $this->Client->query("Select count(pregnant) as numPregnant from clients where $sex AND pregnant = '1'");
        $query2 = $this->Client->query("Select count(disabled) as numDisabled from clients where $sex AND disabled = '1'");
        $query3 = $this->Client->query("Select count(handicapped) as numHandicapped from clients where $sex AND handicapped = '1'");
        $query4 = $this->Client->query("Select count(stove) as numStove from clients where $sex AND stove = '1'");
        $query5 = $this->Client->query("Select count(refrigerator) as numRefrigerator from clients where $sex AND refrigerator = '1'");
        $query6 = $this->Client->query("Select count(cell) as numCell from clients where $sex AND cell = '1'");
        $query7 = $this->Client->query("Select count(cable) as numCable from clients where $sex AND cable = '1'");
        $query8 = $this->Client->query("Select count(internet) as numInternet from clients where $sex AND internet = '1';");
        $retVal[0] = $query1[0][0]['numPregnant'];
        $retVal[1] = $query2[0][0]['numDisabled'];
        $retVal[2] = $query3[0][0]['numHandicapped'];
        $retVal[3] = $query4[0][0]['numStove'];
        $retVal[4] = $query5[0][0]['numRefrigerator'];
        $retVal[5] = $query6[0][0]['numCell'];
        $retVal[6] = $query7[0][0]['numCable'];
        $retVal[7] = $query8[0][0]['numInternet'];
        return $retVal;
    }

    public function numberOfChecklistsCompleted($id = null) {
        $query = $this->Client->query("
                  
            Select count(*) as numCompleted
            From client_checklists
            Where client_id = '$id' AND isCompleted = '1';
                  
            ");

        return $query[0][0]['numCompleted'];
    }
    
    public function numberOfChecklistTasksCompleted($id = null) {
        $query = $this->Client->query("
            
            Select count(*) as numCompleted
            From client_checklist_tasks join client_checklists
            Where client_checklists.client_id = '$id' AND client_checklist_tasks.isCompleted = '1';
                
            ");
        return $query[0][0]['numCompleted'];
    }

    public function numberResourceUses($id = null, $startDate, $endDate) {
        $query = $this->Client->query("
   
            Select count(*) as numResourceUses
            From resource_uses 
            Where client_id = '$id' AND date between '$startDate' and '$endDate'
                
        ");

        return $query[0][0]['numResourceUses'];
    }

    public function printClient($id = null) {
        $this->layout = 'print';
        $this->Client->recursive = -1;
        $this->Client->id = $id;
        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }
        $this->set('client', $this->Client->read(null, $id));
        $this->set('bodyAttr', 'onload="window.print();"');
    }

    public function test($clientID) {
        $this->set('clientID', $clientID);
    }

}

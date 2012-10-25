<?php

App::uses('AppController', 'Controller');


/**
 * Clients Controller
 *
 * @property Client $Client
 */
class ClientsController extends AppController {

    // public $helpers = array('AjaxMultiUpload.Upload');
    public $components = array('Session', 'AjaxMultiUpload.Upload');

    public $helpers = array('Js', 'AjaxMultiUpload.Upload' );

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        if ($this->request->is('post')) {
            $firstName = $this->request->data['Client']['First Name'];
            $lastName = $this->request->data['Client']['Last Name'];

            //PUT AJAX HERE!!
            $correctResults = $this->clientSearch($firstName, $lastName);
            $this->Session->write('results', $correctResults);
            $this->redirect(array('action' => 'searchResults'));
        }
    }

    public function clientSearch($firstName, $lastName) {
        $conditions = array('first_name LIKE ' => $firstName . '%', 'last_name LIKE ' => $lastName . '%');
        $correctResults = $this->Client->find('all', array('conditions' => $conditions));
        return $correctResults;
    }

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
        $this->set('client', $this->Client->read(null, $id));
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
                $this->redirect(array('action' => 'index'));
            }
            if ($this->Client->save($this->request->data)) {
                $this->Session->setFlash(__('The client has been edited'));
                if (isset($this->request->data['editMore'])) {
                    $this->redirect(array('controller' => 'client_relations', 'action' => 'index', $id));
                } else if (isset($this->request->data['finished'])) {
                    $this->redirect(array('action' => 'index'));
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

    public function age() {
        $query = $this->Client->query("Select avg(datediff(curdate(), DOB)) as avgage from clients;");
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

    public function avgIncome() {
        $query = $this->Client->query("Select sum(regular_job + food_stamps + veterans_pension + part_time_job + social_security + 
            annuity_check + child_support + ssi_or_disability + unemployment) as summation from clients;");
        return $query[0][0]['summation'] / $this->count();
    }

    public function status() {
        $retVal = array();
        //FIXME: obviously this is not optimal
        $query1 = $this->Client->query("Select count(pregnant) as numPregnant from clients where pregnant = '1'");
        $query2 = $this->Client->query("Select count(disabled) as numDisabled from clients where disabled = '1'");
        $query3 = $this->Client->query("Select count(handicapped) as numHandicapped from clients where handicapped = '1'");
        $query4 = $this->Client->query("Select count(stove) as numStove from clients where stove = '1'");
        $query5 = $this->Client->query("Select count(refrigerator) as numRefrigerator from clients where refrigerator = '1'");
        $query6 = $this->Client->query("Select count(cell) as numCell from clients where cell = '1'");
        $query7 = $this->Client->query("Select count(cable) as numCable from clients where cable = '1'");
        $query8 = $this->Client->query("Select count(internet) as numInternet from clients where internet = '1';");
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
            From client_checklist
            Where client_id = '$id' AND isCompleted='true';
                  
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

}

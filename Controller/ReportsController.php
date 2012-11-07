<?php

App::uses('AppController', 'Controller');
App::uses('ClientsController', 'Controller');
App::uses('OrganizationsController', 'Controller');
App::uses('ResourcesController', 'Controller');
App::uses('ResourceUsesController', 'Controller');
App::uses('PrayerRequests', 'Controller');
App::uses('ClientChecklists', 'Controller');

class ReportsController extends AppController {

    public $uses = array("ResourceUse", "Organization", "PrayerRequest", "ClientChecklist");
    public $helpers = array('Js');
    public $name = 'Reports';

    public function index() {
        $clientsController = new ClientsController();

        if ($this->request->is('post')) {
            $names = explode(" ", $this->request->data['Client']['Name']);

            $posVal = strpos($names[0], ',');
            if ($posVal !== false) {
                $lastName = substr($names[0], 0, $posVal);
                $firstName = $names[1];
            } else {
                $firstName = $names[0];
                $lastName = $names[1];
            }

            $startDate = $this->request->data['startDate'];
            $endDate = $this->request->data['endDate'];

            if ($startDate > $endDate) {
                $this->Session->setFlash('Invalid date range');
                $this->redirect(array('action' => 'index'));
            }

            $correctResults = $clientsController->clientSearch($firstName, $lastName);
            $this->Session->write('clientResults', $correctResults);
            $this->Session->write('startDate', $startDate);
            $this->Session->write('endDate', $endDate);

            if (count($correctResults) == 1) {
                $this->redirect(array('action' => 'clientReport', $correctResults[0]['Client']['id']));
            } else {
                $this->redirect(array('action' => 'clientReportSearch'));
            }
        }
    }

    public function resourceIndex() {

        if ($this->request->is('post')) {
            $startDate = $this->request->data['startDate'];
            $endDate = $this->request->data['endDate'];

            if ($startDate > $endDate) {
                $this->Session->setFlash('Invalid date range');
                $this->redirect(array('action' => 'resourceIndex'));
            }

            $resourceName = $this->request->data['Resource']['resource_name'];
            $correctResults = $this->resourceSearch($resourceName);

            $this->Session->write('resourceResults', $correctResults);
            $this->Session->write('startDate', $startDate);
            $this->Session->write('endDate', $endDate);
            $this->redirect(array('action' => 'resourceReportSearch'));
        }

        $organizations = $this->Organization->find('list');
        $this->set(compact('organizations'));
    }

    public function countsIndex() {
        if ($this->request->is('post')) {

            $startDate = $this->request->data['startDate'];
            $range = 'monthly';
            if ($this->request->data('weekMonthChooser') == 'weekly') {
                $range = 'weekly';
            }
            $dates = $this->figureOutStartEnd($startDate, $range);

            $this->Session->write('startDate', $dates[0]);
            $this->Session->write('endDate', $dates[1]);

            $sex = 'both';
            if ($this->request->data('sexChooser') == 'male') {
                $sex = 'male';
            }
            if ($this->request->data('sexChooser') == 'female') {
                $sex = 'female';
            }
            $this->Session->write('sex', $sex);

            $this->redirect(array('action' => 'counts'));
        }
    }

    public function listsIndex() {
        if ($this->request->is('post')) {

            $startDate = $this->request->data['startDate'];
            $range = 'monthly';
            if ($this->request->data('weekMonthChooser') == 'weekly') {
                $range = 'weekly';
            }
            $dates = $this->figureOutStartEnd($startDate, $range);

            $this->Session->write('startDate', $dates[0]);
            $this->Session->write('endDate', $dates[1]);

            $sex = 'both';
            if ($this->request->data('sexChooser') == 'male') {
                $sex = 'male';
            }
            if ($this->request->data('sexChooser') == 'female') {
                $sex = 'female';
            }
            $this->Session->write('sex', $sex);

            $this->redirect(array('action' => 'lists'));
        }
    }

    public function figureOutStartEnd($startDate, $range) {
        $retVal = array();
        $startYear = substr($startDate, 0, 4);
        $startMonth = substr($startDate, 5, -3);
        $startDay = substr($startDate, 8, 9);
        $endDay = $startDay;
        $endYear = $startYear;
        $endMonth = $startMonth;

        if ($range == 'weekly') {
            $endDay += 7;
            if ($endDay > 30) {
                $endDay = $endDay % 30;
                $endMonth++;
                if ($endMonth > 12) {
                    $endMonth = $endMonth % 12;
                    $endYear++;
                }
            }
        } else if ($range == 'monthly') {
            $startDay = '0' . '1';
            $endDay = 30;
        }

        if (strlen($endDay) == 1) {
            $endDay = "0" . $endDay;
        }

        $retVal[0] = $startYear . "-" . $startMonth . "-" . $startDay;
        $retVal[1] = $endYear . "-" . $endMonth . "-" . $endDay;
        return $retVal;
    }

    public function counts() {
        $startDate = $this->Session->read('startDate');
        $endDate = $this->Session->read('endDate');
        $sex = $this->Session->read('sex');

        if ($sex == 'male')
            $sex = "clients.sex = 'M'";
        else if ($sex == 'female')
            $sex = "clients.sex = 'F'";
        else
            $sex = "(clients.sex = 'M' OR clients.sex = 'F')";;
        
        $this->set('startDate', $startDate);
        $this->set('endDate', $endDate);
        $this->set('startCompare', strtotime($this->Session->read('startDate')));
        $this->set('endCompare', strtotime($this->Session->read('endDate')));
        $this->set('sex', $this->Session->read('sex'));

        $clientsController = new ClientsController();
        $resourceUsesController = new ResourceUsesController();
        $resourcesController = new ResourcesController();

        $this->set('countPeriod', $resourceUsesController->countPeriod($startDate, $endDate, $sex));
        $this->set('numClients', $clientsController->count());
        $this->set('ageClients', $clientsController->age($sex));
        $this->set('sexClients', $clientsController->sexCount());
        $this->set('statusClients', $clientsController->status($sex));
        $this->set('incomeAvgClients', $clientsController->avgIncome($sex));
        $this->set('mostPopular', $resourceUsesController->mostPopular());
        $this->set('numResources', $resourcesController->count());
    }

    public function lists() {
        $this->set('startDate', $this->Session->read('startDate'));
        $this->set('endDate', $this->Session->read('endDate'));
        $this->set('startCompare', strtotime($this->Session->read('startDate')));
        $this->set('endCompare', strtotime($this->Session->read('endDate')));
        $this->set('sex', $this->Session->read('sex'));
        $this->set('resourceUses', $this->ResourceUse->find('all'));
        $this->set('prayerRequests', $this->PrayerRequest->find('all'));
        $this->set('clientChecklists', $this->ClientChecklist->find('all'));

    }

    public function resourceSearch($resourceName) {
        $resourcesController = new ResourcesController();

        $conditions = array('resource_name LIKE ' => $resourceName);
        $correctResults = $resourcesController->Resource->find('all', array('conditions' => $conditions));
        return $correctResults;
    }

    public function clientSearch($firstName, $lastName) {
        $conditions = array('first_name LIKE ' => $firstName . '%', 'last_name LIKE ' => $lastName . '%');
        $correctResults = $this->Client->find('all', array('conditions' => $conditions));
        return $correctResults;
    }

    public function clientReportSearch() {
        $this->set('results', $this->Session->read('clientResults'));
    }

    public function resourceReportSearch() {
        $this->set('results', $this->Session->read('resourceResults'));
    }

    public function clientReport($clientID = null) {
        $this->set('startDate', $this->Session->read('startDate'));
        $this->set('endDate', $this->Session->read('endDate'));
        $this->set('startCompare', strtotime($this->Session->read('startDate')));
        $this->set('endCompare', strtotime($this->Session->read('endDate')));

        $clientsController = new ClientsController();
        $this->set('numChecklistsCompleted', $clientsController->numberOfChecklistsCompleted($clientID));
        $this->set('numChecklistTasksCompleted', $clientsController->numberOfChecklistTasksCompleted($clientID));
        $this->set('numberResourceUses', $clientsController->numberResourceUses($clientID, $this->Session->read('startDate'), $this->Session->read('endDate')));

        $clientsController->Client->id = $clientID;
        if (!$clientsController->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }

        $client = $clientsController->Client->read(null, $id);
        $resourceUses = array();
        $resourceName = array();
        $resourceController = new ResourcesController();

        $i = 0;
        foreach ($client['ResourceUs'] as $resourceUse) {
            if ($resourceUse['client_id'] == $client['Client']['id']) {
                $resourceUses[$i] = $resourceUse;
                $resourceName[$i] = $resourceController->giveMeName($resourceUse['resource_id']);
                $i++;
            }
        }

        $this->set('resourceUses', $resourceUses);
        $this->set('resourceName', $resourceName);
        $this->set('client', $client);
    }

    public function resourceReport($resourceID = null) {
        $this->set('startDate', $this->Session->read('startDate'));
        $this->set('endDate', $this->Session->read('endDate'));
        $this->set('startCompare', strtotime($this->Session->read('startDate')));
        $this->set('endCompare', strtotime($this->Session->read('endDate')));

        $resourcesController = new ResourcesController();
        $resourceUsesController = new ResourceUsesController();
        $this->set('numberResourceUses', $resourceUsesController->countParticular($resourceID, $this->Session->read('startDate'), $this->Session->read('endDate')));
        $this->set('mostPopular', $resourceUsesController->mostPopularClient($resourceID, $this->Session->read('startDate'), $this->Session->read('endDate')));

        $resourcesController->Resource->id = $resourceID;
        if (!$resourcesController->Resource->exists()) {
            throw new NotFoundException(__('Invalid Resource'));
        }
        $this->set('resource', $resourcesController->Resource->read(null, $id));
    }

}

?>

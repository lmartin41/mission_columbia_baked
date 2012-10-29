<?php

App::uses('AppController', 'Controller');
App::uses('ClientsController', 'Controller');
App::uses('OrganizationsController', 'Controller');
App::uses('ResourcesController', 'Controller');
App::uses('ResourceusesController', 'Controller');

class ReportsController extends AppController {

    public $helpers = array('Js');
    public $name = 'Reports';

    public function index() {
        $clientsController = new ClientsController();

        if ($this->request->is('post')) {
            $names = explode(" ", $this->request->data['Client']['Name']);
            $firstName = $names[0];
            $lastName = $names[1];
            $startDate = $this->request->data['startDate'];
            $endDate = $this->request->data['endDate'];
            $correctResults = $clientsController->clientSearch($firstName, $lastName);
            $this->Session->write('clientResults', $correctResults);
            $this->Session->write('startDate', $startDate);
            $this->Session->write('endDate', $endDate);
            $this->redirect(array('action' => 'clientReportSearch'));
        }
    }

    public function resourceIndex() {
        $resourcesController = new ResourcesController();

        if ($this->request->is('post')) {
            $resourceName = $this->request->data['Resource']['resource_name'];
            $correctResults = $this->resourceSearch($resourceName);
            $startDate = $this->request->data['startDate'];
            $endDate = $this->request->data['endDate'];
            $this->Session->write('resourceResults', $correctResults);
            $this->Session->write('startDate', $startDate);
            $this->Session->write('endDate', $endDate);
            $this->redirect(array('action' => 'resourceReportSearch'));
        }
    }

    public function aggregateClientsIndex() {
        if ($this->request->is('post')) {
            $startDate = $this->request->data['startDate'];
            $startYear = substr($startDate, 0, 4);
            $startMonth = substr($startDate, 5, -3);
            $startDay = substr($startDate, 8, 9);
            $endDay = $startDay;
            $endYear = $startYear;
            $endMonth = $startMonth;

            if ($this->request->data('weekMonthChooser') == 'weekly') {
                $endDay += 7;
                if ($endDay > 30) {
                    $endDay = $endDay % 30;
                    $endMonth++;
                    if ($endMonth > 12) {
                        $endMonth = $endMonth % 12;
                        $endYear++;
                    }
                }
            } else if ($this->request->data('weekMonthChooser') == 'monthly') {
                $startDay = 0;
                $endDay = 30;
            }
            
            if (strlen($endDay) == 1) $endDay = "0".$endDay;
            $endDate = $endYear . "-" . $endMonth . "-" . $endDay;

            $this->Session->write('startDate', $startDate);
            $this->Session->write('endDate', $endDate);
            $this->redirect(array('action' => 'aggregateClientsReport'));
        }
    }

    public function aggregateResourcesIndex() {
       if ($this->request->is('post')) {
            $startDate = $this->request->data['startDate'];
            $startYear = substr($startDate, 0, 4);
            $startMonth = substr($startDate, 5, -3);
            $startDay = substr($startDate, 8, 9);
            $endDay = $startDay;
            $endYear = $startYear;
            $endMonth = $startMonth;

            if ($this->request->data('weekMonthChooser') == 'weekly') {
                $endDay += 7;
                if ($endDay > 30) {
                    $endDay = $endDay % 30;
                    $endMonth++;
                    if ($endMonth > 12) {
                        $endMonth = $endMonth % 12;
                        $endYear++;
                    }
                }
            } else if ($this->request->data('weekMonthChooser') == 'monthly') {
                $startDay = 0;
                $endDay = 30;
            }
            
            if (strlen($endDay) == 1) $endDay = "0".$endDay;
            $endDate = $endYear . "-" . $endMonth . "-" . $endDay;

            $this->Session->write('startDate', $startDate);
            $this->Session->write('endDate', $endDate);
            $this->redirect(array('action' => 'aggregateResourcesReport'));
        }
    }
    

    public function aggregateClientsReport() {
        $startDate = $this->Session->read('startDate');
        $endDate = $this->Session->read('endDate');
        
        $this->set('startDate', $startDate);
        $this->set('endDate', $endDate);
        $this->set('startCompare', strtotime($this->Session->read('startDate')));
        $this->set('endCompare', strtotime($this->Session->read('endDate')));

        $clientsController = new ClientsController();
        $resourceUsesController = new ResourceusesController();
        
        $this->set('countPeriod', $resourceUsesController->countPeriod($startDate, $endDate));

        $this->set('numClients', $clientsController->count());
        $this->set('ageClients', $clientsController->age());
        $this->set('sexClients', $clientsController->sexCount());
        $this->set('statusClients', $clientsController->status());
        $this->set('incomeAvgClients', $clientsController->avgIncome());
    }

    public function aggregateResourcesReport() {
        $this->set('startDate', $this->Session->read('startDate'));
        $this->set('endDate', $this->Session->read('endDate'));
        $this->set('startCompare', strtotime($this->Session->read('startDate')));
        $this->set('endCompare', strtotime($this->Session->read('endDate')));

        $resourcesController = new ResourcesController();
        $resourceUsesController = new ResourceusesController();

        $this->set('mostPopular', $resourceUsesController->mostPopular());
        $this->set('numResources', $resourcesController->count());
        $this->set('numResourceUses', $resourceUsesController->count());
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
        $this->set('numberResourceUses', $clientsController->numberResourceUses($clientID, $this->Session->read('startDate'), $this->Session->read('endDate')));

        $clientsController->Client->id = $clientID;
        if (!$clientsController->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }
        $this->set('client', $clientsController->Client->read(null, $id));
       
    }

    public function resourceReport($resourceID = null) {
        $this->set('startDate', $this->Session->read('startDate'));
        $this->set('endDate', $this->Session->read('endDate'));
        $this->set('startCompare', strtotime($this->Session->read('startDate')));
        $this->set('endCompare', strtotime($this->Session->read('endDate')));

        $resourcesController = new ResourcesController();
        $resourceUsesController = new ResourceusesController();
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

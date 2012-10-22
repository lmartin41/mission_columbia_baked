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
            $firstName = $this->request->data['Client']['first_name'];
            $lastName = $this->request->data['Client']['last_name'];
            $startDate = $this->request->data['startDate'];
            $endDate = $this->request->data['endDate'];
            $correctResults = $clientsController->clientSearch($firstName, $lastName);
            $this->Session->write('results', $correctResults);
            $this->Session->write('startDate', $startDate);
            $this->Session->write('endDate', $endDate);
            $this->redirect(array('action' => 'clientReportSearch'));
        }
    }

    public function resourceReport() {
        $resourcesController = new ResourcesController();

        if ($this->request->is('post')) {
            if ($this->request->is('post')) {
                if (isset($this->request->data['client'])) {
                    $results = $clientsController->clientSearch($this->data['Client']['last_name'], $this->data['Client']['first_name']);
                    // $timeFrom = $this->request->data(datePickClient);
                    // $timeTo = $this->request->data(datePickClient2);
                    $this->Session->write('clientReportResults', $results);
                    $this->redirect(array('controller' => 'clients', 'action' => 'clientReportSearch'));
                }
            }
        }
    }

    public function aggregateReport() {
        $resourcesController = new ResourcesController();
        $clientsController = new ClientsController();
        $organizationsController = new OrganizationsController();

        $this->set('numClients', $clientsController->count());
        $this->set('ageClients', $clientsController->age());
        $this->set('sexClients', $clientsController->sexCount());
        $this->set('statusClients', $clientsController->status());
        $this->set('incomeAvgClients', $clientsController->avgIncome());
        $this->set('numResources', $resourcesController->count());
        $this->set('numResourceUses', $resourceUsesController->count());
        $this->set('mostPopular', $resourceUsesController->mostPopular());
    }

    public function clientReportSearch() {
        $this->set('results', $this->Session->read('results'));
    }

    public function clientReport($clientID = null) {
        $this->set('startDate', $this->Session->read('startDate'));
        $this->set('endDate', $this->Session->read('endDate'));
        $this->set('startCompare', strtotime($this->Session->read('startDate')));
        $this->set('endCompare', strtotime($this->Session->read('endDate')));
        
        $clientsController = new ClientsController();
        $this->set('numChecklistsCompleted', $clientsController->numberOfChecklistsCompleted($clientID));
        
        $clientsController->Client->id = $clientID;
        if (!$clientsController->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }
        $this->set('client', $clientsController->Client->read(null, $id));
    }

}

?>

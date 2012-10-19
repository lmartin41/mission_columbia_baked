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
        $organizationsController = new OrganizationsController();
        $resourcesController = new ResourcesController();
        $resourceUsesController = new ResourceusesController();
        $this->set('numClients', $clientsController->count());
        $this->set('ageClients', $clientsController->age());
        $this->set('sexClients', $clientsController->sexCount());
        $this->set('statusClients', $clientsController->status());
        $this->set('incomeAvgClients', $clientsController->avgIncome());
        $this->set('numOrganizations', $organizationsController->count());
        $this->set('numResources', $resourcesController->count());
        $this->set('numResourceUses', $resourceUsesController->count());
        $this->set('mostPopular', $resourceUsesController->mostPopular());

        if ($this->request->is('post')) {
            if ($this->request->is('post')) {
                $results = $clientsController->clientSearch($this->data['Client']['last_name'], $this->data['Client']['first_name']);
                $this->Session->write('clientReportResults', $results);
                $this->redirect(array('controller' => 'clients', 'action' => 'clientReportSearch'));
            }
        }
    }

}

?>

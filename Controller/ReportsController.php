<?php

App::uses('AppController', 'Controller');
App::uses('ClientsController', 'Controller');
App::uses('OrganizationsController', 'Controller');
App::uses('ResourcesController', 'Controller');
App::uses('ResourceUsesController', 'Controller');
App::uses('PrayerRequests', 'Controller');
App::uses('ClientChecklists', 'Controller');
App::uses('GoogleChart', 'GoogleChart.Lib');

class ReportsController extends AppController {

    public $uses = array("ResourceUs", "Organization", "PrayerRequest", "ClientChecklist", "Resource", "Client");
    public $helpers = array('Js', 'GoogleChart.GoogleChart');
    public $name = 'Reports';
    public $paginate = array(
        'limit' => 10
    );

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
                if (count($names) > 1)
                    $lastName = $names[1];
                else
                    $lastName = null;
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

            $resourceID = $this->request->data['ResourceUs']['resource_id'];
            $correctResuorce = $this->Resource->read(null, $resourceID);

            $this->Session->write('resourceResults', $correctResults);
            $this->Session->write('startDate', $startDate);
            $this->Session->write('endDate', $endDate);
            $this->redirect(array('action' => 'resourceReport', $this->request->data['ResourceUs']['resource_id']));
        }

        $organizations = $this->Organization->find('list');
        $this->set(compact('organizations'));
    }

    public function countsIndex() {
        if ($this->request->is('post')) {

            $startDate = $this->request->data['startDate'];
            $endDate = $this->request->data['endDate'];
            $range = 'monthly';
            if ($this->request->data('weekMonthChooser') == 'weekly') {
                $range = 'weekly';
            }

            $this->Session->write('startDate', $startDate);
            $this->Session->write('endDate', $endDate);
            $this->Session->write('range', $range);
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

    public function counts() {
        $startDate = $this->Session->read('startDate');
        $endDate = $this->Session->read('endDate');
        $range = $this->Session->read('range');
        $this->set('startDate', $startDate);
        $this->set('endDate', $endDate);
        $this->set('startCompare', strtotime($this->Session->read('startDate')));
        $this->set('endCompare', strtotime($this->Session->read('endDate')));
        $resourceUseController = new ResourceUsesController();
        $this->set('totalNumber', $resourceUseController->countPeriod($startDate, $endDate));

        if ($range == 'monthly') {
            $dates = $this->ResourceUs->query("
           Select count(date) as counts, date 
           from resource_uses 
           where date between '$startDate' AND '$endDate'
           group by month(date);
            ");
        } else {
            $dates = $this->ResourceUs->query("
           Select count(date) as counts, date 
           from resource_uses 
           where date between '$startDate' AND '$endDate'
           group by week(date);
            ");
        }
        if (!empty($dates)) {
            $chart = new GoogleChart();
            $chart->type("ColumnChart");
            $chart->options(array(
                'title' => '',
                'width' => '750',
                'vAxis' => array(
                    'viewWindow' => array(
                        'min' => 0,
                        'max' => 100)),
            ));
            $chart->columns(array(
                'date' => array(
                    'type' => 'string',
                    'label' => 'date'
                ),
                'counts' => array(
                    'type' => 'number',
                    'label' => 'Resource Usage'
                )
            ));

            foreach ($dates as $date) {
                $chart->addRow(array('date' => $date['resource_uses']['date'], 'counts' => intVal($date[0]['counts']), 10));
            }
            $this->set(compact('chart'));
        }

        $this->ResourceUs->recursive = 0;
       $this->set('resourceuses', $this->paginate('ResourceUs', "date between '$startDate' AND '$endDate'"));
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

    public function clientSearch($firstName, $lastName) {
        $conditions = array('first_name LIKE ' => $firstName . '%', 'last_name LIKE ' => $lastName . '%');
        $correctResults = $this->Client->find('all', array('conditions' => $conditions));
        return $correctResults;
    }

    public function clientReportSearch() {
        $this->set('results', $this->Session->read('clientResults'));
    }

    public function clientReport($clientID = null) {
        $startDate = $this->Session->read('startDate');
        $endDate = $this->Session->read('endDate');
        $startCompare = strtotime($startDate);
        $endCompare = strtotime($endDate);
        $this->set('startDate', $startDate);
        $this->set('endDate', $endDate);
        $this->set('startCompare', $startCompare);
        $this->set('endCompare', $endCompare);

        $dates = $this->ResourceUs->query("
           Select count(date) as counts, date 
           from resource_uses 
           where client_id = '$clientID' AND date between '$startDate' AND '$endDate'
           group by date;
            ");

        if (!empty($dates)) {
            $chart = new GoogleChart();
            $chart->type("ColumnChart");
            $chart->options(array(
                'title' => '',
                'width' => '750',
                'vAxis' => array(
                    'viewWindow' => array(
                        'min' => 0,
                        'max' => 15)),
            ));
            $chart->columns(array(
                'date' => array(
                    'type' => 'string',
                    'label' => 'date'
                ),
                'counts' => array(
                    'type' => 'number',
                    'label' => 'Resource Usage'
                )
            ));


            foreach ($dates as $date) {
                $chart->addRow(array('date' => $date['resource_uses']['date'], 'counts' => intVal($date[0]['counts']), 10));
            }

            $this->set(compact('chart'));
        }

        $clientsController = new ClientsController();
        $this->set('numberResourceUses', $clientsController->numberResourceUses($clientID, $startDate, $endDate));

        $client = $this->Client->read(null, $clientID);
        $resourceUses = array();
        $resourceName = array();
        $organizationName = array();

        $this->ResourceUs->recursive = 0;
        $this->set('resourceuses', $this->paginate('ResourceUs', "client_id = $clientID AND date between '$startDate' AND '$endDate'"));
        $this->set('client', $client);
    }

    public function resourceReport($resourceID = null) {
        $startDate = $this->Session->read('startDate');
        $endDate = $this->Session->read('endDate');
        $startCompare = strtotime($startDate);
        $endCompare = strtotime($endDate);
        $this->set('startDate', $startDate);
        $this->set('endDate', $endDate);
        $this->set('startCompare', $startCompare);
        $this->set('endCompare', $endCompare);

        $dates = $this->ResourceUs->query("
           Select count(date) as counts, date 
           from resource_uses 
           where resource_id = '$resourceID' AND date between '$startDate' AND '$endDate'
           group by date;
            ");

        if (!empty($dates)) {
            $chart = new GoogleChart();
            $chart->type("ColumnChart");
            $chart->options(array(
                'title' => '',
                'width' => '750',
                'vAxis' => array(
                    'viewWindow' => array(
                        'min' => 0,
                        'max' => 120)),
            ));

            $chart->columns(array(
                'date' => array(
                    'type' => 'string',
                    'label' => 'date'
                ),
                'counts' => array(
                    'type' => 'number',
                    'label' => 'Resource Usage'
                )
            ));

            foreach ($dates as $date) {
                $chart->addRow(array('date' => $date['resource_uses']['date'], 'counts' => intVal($date[0]['counts']), 10));
            }

            $this->set(compact('chart'));
        }


        $this->ResourceUs->recursive = 0;
        $this->set('resourceuses', $this->paginate('ResourceUs', "resource_id = $resourceID AND date between '$startDate' AND '$endDate'"));
        $this->set('resource', $this->Resource->read(null, $resourceID));
        $rCont = new ResourceUsesController();
        $numberResourceUses = $rCont->countParticular($resourceID, $startDate, $endDate);
        $this->set('numberResourceUses', $numberResourceUses);
    }

}

?>

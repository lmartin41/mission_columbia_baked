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

    public function prayerIndex() {
        if ($this->request->is('post')) {
            $startDate = $this->request->data['startDate'];
            $endDate = $this->request->data['endDate'];
            $this->Session->write('startDate', $startDate);
            $this->Session->write('endDate', $endDate);
            $this->redirect(array('action' => 'prayerJournal'));
        }
    }
    
    public function printPrayers() {
        $startDate = $this->Session->read('startDate');
        $endDate = $this->Session->read('endDate');
        $this->layout = 'print';
        $this->PrayerRequest->recursive = 0;
        $current_user = $this->Auth->user();
        $current_user_orgID = $current_user['organization_id'];
        $this->set('prayerRequests', $this->paginate('PrayerRequest', 
                "PrayerRequest.organization_id = $current_user_orgID AND PrayerRequest.created between '$startDate' AND '$endDate'"));
        $this->set('bodyAttr', 'onload="window.print();"');
    }

    public function prayerJournal() {
        $startDate = $this->Session->read('startDate');
        $endDate = $this->Session->read('endDate');
        $this->PrayerRequest->recursive = 0;
        $current_user = $this->Auth->user();
        $current_user_orgID = $current_user['organization_id'];
        $this->set('prayerRequests', $this->paginate('PrayerRequest', 
                "PrayerRequest.organization_id = $current_user_orgID AND PrayerRequest.created >= '$startDate' AND PrayerRequest.created < DATE(DATE_ADD('$endDate', INTERVAL +1 DAY))"));
    }
    
    /****************************** COUNTS ************************************/
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
    
    public function counts() {
        $startDate = $this->Session->read('startDate');
        $endDate = $this->Session->read('endDate');
        $range = $this->Session->read('range');
        $this->set('startDate', $startDate);
        $this->set('endDate', $endDate);
        $this->set('startCompare', strtotime($this->Session->read('startDate')));
        $this->set('endCompare', strtotime($this->Session->read('endDate')));
        $this->set('countSingles', $this->countSingles($startDate, $endDate));
        $this->set('countFamilyUnits', $this->countFamilyUnits($startDate, $endDate));

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
    
    /**************************** RESOURCE REPORT ********************************/
    public function resourceIndex() {
        if ($this->request->is('post')) {
            $startDate = $this->request->data['startDate'];
            $endDate = $this->request->data['endDate'];

            if ($startDate > $endDate) {
                $this->Session->setFlash('Invalid date range');
                $this->redirect(array('action' => 'resourceIndex'));
            }
            
            $range = 'year';
            if ($this->request->data('weekMonthChooser') == 'weekly') {
                $range = 'week';
            }
            else if ($this->request->data('weekMonthChooser') == 'monthly') {
                $range = 'month';
            }

            $this->redirect(array('action' => 'resourceReport', $this->request->data['ResourceUs']['resource_id'], $startDate, $endDate, $range));
        }

        $organizations = $this->Organization->find('list');
        $this->set(compact('organizations'));
    }
    
    public function resourceReport($resourceID = null, $startDate = null, $endDate = null, $range = null) {
        $startCompare = strtotime($startDate);
        $endCompare = strtotime($endDate);
        $this->set('startDate', $startDate);
        $this->set('endDate', $endDate);
        $this->set('startCompare', $startCompare);
        $this->set('endCompare', $endCompare);
        
        //TOTALS
        $datesTotal = $this->ResourceUs->query("
           Select count(date) as counts, date 
           from resource_uses 
           where resource_id = '$resourceID' AND date between '$startDate' AND '$endDate'
           group by " . $range . "(date);
            ");

        if (!empty($datesTotal)) {
            $chartTotal = new GoogleChart();
            $chartTotal->setDiv = 'chartTotal_div';
            $chartTotal->type("ColumnChart");
            $chartTotal->options(array(
                'title' => '',
                'width' => '750',
                'vAxis' => array(
                    'viewWindow' => array(
                        'min' => 0,
                        'max' => 120)),
            ));

            $chartTotal->columns(array(
                'date' => array(
                    'type' => 'string',
                    'label' => 'date'
                ),
                'counts' => array(
                    'type' => 'number',
                    'label' => 'Resource Usage'
                )
            ));

            foreach ($datesTotal as $date) {
                $chartTotal->addRow(array('date' => $date['resource_uses']['date'], 'counts' => intVal($date[0]['counts']), 10));
            }

            $this->set('chartTotal', $chartTotal);  
        }
        
        //FAMILY UNITS
        $datesFamily = $this->ResourceUs->query("
           Select distinct count(resource_uses.date) as counts, resource_uses.date as date
           from resource_uses
                join clients on clients.id = resource_uses.client_id
                join client_relations on client_relations.client_id = clients.id
           where resource_id = '$resourceID' AND date between '$startDate' AND '$endDate'
           group by " . $range . "(date);
            ");

        if (!empty($datesFamily)) {
            $chartFamily = new GoogleChart();
            $chartFamily->setDiv = 'chartFamily_div';
            $chartFamily->type("ColumnChart");
            $chartFamily->options(array(
                'title' => '',
                'width' => '750',
                'vAxis' => array(
                    'viewWindow' => array(
                        'min' => 0,
                        'max' => 120)),
            ));

            $chartFamily->columns(array(
                'date' => array(
                    'type' => 'string',
                    'label' => 'date'
                ),
                'counts' => array(
                    'type' => 'number',
                    'label' => 'Resource Usage'
                )
            ));

            foreach ($datesFamily as $date) {
                $chartFamily->addRow(array('date' => $date['resource_uses']['date'], 'counts' => intVal($date[0]['counts']), 10));
            }

            $this->set('chartFamily', $chartFamily); 
        }


        $this->ResourceUs->recursive = 0;
        $this->set('resourceuses', $this->paginate('ResourceUs', "resource_id = $resourceID AND date between '$startDate' AND '$endDate'"));
        $this->set('resource', $this->Resource->read(null, $resourceID));
        $this->set("countParticularSingles", $this->countParticularSingles($resourceID, $startDate, $endDate));
        $this->set("countParticularFamilyUnits", $numberResourceUses = $this->countParticularFamilyUnits($resourceID, $startDate, $endDate));
    }
    
        public function printResourceUsage($id = null) {
        $this->layout = 'print';
        $this->Resource->recursive = -1;
        $this->Resource->id = $id;
        if (!$this->Resource->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }
        $this->set('resource', $this->Resource->read(null, $id));
        $this->set('bodyAttr', 'onload="window.print();"');
    }
    
    
     /**
     * Lee: Report functions 
     */
    public function countSingles($startDate, $endDate) {
        $query = $this->ResourceUs->query("
                Select count(DISTINCT resource_uses.id) as period
                From resource_uses join clients
                Where date between '$startDate' AND '$endDate';
            ");
        return $query[0][0]['period'] - $this->countFamilyUnits($startDate, $endDate);
    }
    
     public function countFamilyUnits($startDate, $endDate) {
        $query = $this->ResourceUs->query("
                Select count(DISTINCT client_relations.client_id) as period
                From resource_uses 
                    join clients on clients.id = resource_uses.client_id
                    join client_relations on client_relations.client_id = clients.id 
                Where date between '$startDate' AND '$endDate';
            ");
        return $query[0][0]['period'];
    }
    
    public function countParticularSingles($resourceID, $startDate, $endDate) {
        $query = $this->ResourceUs->query("
                Select count(resource_id) as period
                From resource_uses
                Where resource_id = '$resourceID' AND date between '$startDate' and '$endDate';
            ");
        return $query[0][0]['period'] - $this->countParticularFamilyUnits($resourceID, $startDate, $endDate);
    }
    
    public function countParticularFamilyUnits($resourceID, $startDate, $endDate) {
        $query = $this->ResourceUs->query("
                Select count(DISTINCT client_relations.client_id) as period
                From resource_uses 
                    join clients on clients.id = resource_uses.client_id
                    join client_relations on client_relations.client_id = clients.id 
                Where resource_uses.resource_id = '$resourceID' AND date between '$startDate' AND '$endDate';
            ");
        return $query[0][0]['period'];
    }

}

?>

<?php

App::uses('AppController', 'Controller');
App::uses('ResourcesController', 'Controller');
App::uses('LoggersController', 'Controller');

/* for custom labels -- defining these as an array because I am not 
 * anticipating on them changing/any being added (other than the custom fields)
 * - Lee 
 */
$GLOBALS['client_labels'] = array(
    'First Name' => 'First Name',
    'Last Name' => 'Last Name',
    'Sex' => 'Sex',
    'DOB' => 'DOB',
    'Age' => 'Age',
    'Address' => 'Address',
    'Apt #' => 'Apt #',
    'City' => 'City',
    'State' => 'State',
    'Zip' => 'Zip',
    'Phone' => 'Phone',
    'Regular Job' => 'Regular Job',
    'Food Stamps' => 'Food Stamps',
    'Veterans Pension' => 'Veterans Pension',
    'Part Time Job' => 'Part Time Job',
    'Social Security' => 'Social Security',
    'Annuity Check' => 'Annuity Check',
    'Child Support' => 'Child Support',
    'SSI Or Disability' => 'SSI Or Disability',
    'Unemployment' => 'Unemployment',
    'When Next Check' => 'When Next Check',
    'Pregnant' => 'Pregnant',
    'Disabled' => 'Disabled',
    'Handicapped' => 'Handicapped',
    'Stove' => 'Stove',
    'Refrigerator' => 'Refrigerator',
    'Cell' => 'Cell',
    'Cable' => 'Cable',
    'Internet' => 'Internet',
    'Accepted Christ' => 'Accepted Christ',
    'Dedicated Christ' => 'Dedicated Christ',
    'Model of Car' => 'Model Of Car',
    'How Did You Hear About Us?' => 'How Did You Hear About Us?',
    'How Long Do You Need?' => 'How Long Do You Need?'
);

/**
 * Clients Controller
 *
 * @property Client $Client
 */
class ClientsController extends AppController {

    public $uses = array('Client', 'Resource', 'Field', 'FieldInstance', 'Lookup', 'PrayerRequest', 'ClientChecklistTask', 'ClientRelation', 'ClientChecklist', 'ResourceUs');
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
        //$this->Client->recursive = 0;
        //$this->set('clients', $this->paginate());
    }

    public function dataTables() {
        $aColumns = array('Client.first_name', 'Client.last_name', 'Client.DOB');
        $params = array();

        //Paging
        if (isset($this->params['url']['iDisplayStart']) && $this->params['url']['iDisplayLength'] != '-1') {
            $params['limit'] = $this->params['url']['iDisplayLength'];
            $params['offset'] = $this->params['url']['iDisplayStart'];
        }

        //Sorting
        if (isset($this->params['url']['iSortCol_0'])) {
            $order = array();
            for ($i = 0; $i < intval($this->params['url']['iSortingCols']); $i++) {
                if ($this->params['url']['bSortable_' . intval($this->params['url']['iSortCol_' . $i])] == "true") {
                    $order[] = $aColumns[intval($this->params['url']['iSortCol_' . $i])] . ' ' . $this->params['url']['sSortDir_' . $i];
                }
            }

            $params['order'] = $order;
        }

        //Filtering
        if (isset($this->params['url']['sSearch']) && $this->params['url']['sSearch'] != "") {
            $comma = strpos($this->params['url']['sSearch'], ',');
            $space = strpos($this->params['url']['sSearch'], ' ');

            if ($comma === false && $space === false) {
                $conditions = array('OR' => array());
                for ($i = 0; $i < count($aColumns); $i++) {
                    if (isset($this->params['url']['bSearchable_' . $i]) &&
                            $this->params['url']['bSearchable_' . $i] == "true") {
                        $conditions['OR'][$aColumns[$i] . ' LIKE '] = $this->params['url']['sSearch'] . '%';
                    }
                }
            } else {
                if ($comma !== false) {
                    $firstName = trim(substr($this->params['url']['sSearch'], $comma + 1));
                    $lastName = trim(substr($this->params['url']['sSearch'], 0, $comma));
                } else {
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

        $params['fields'] = array('Client.id', 'Client.first_name', 'Client.last_name', 'Client.DOB');
        $params['recursive'] = -1; //no need for joins
        
        $raw_data = $this->Client->find('all', $params);
        $total = $this->Client->find('count');
        if (isset($params['conditions'])) {
            $filteredTotal = $this->Client->find('count', array('conditions' => $params['conditions']));
        } else {
            $filteredTotal = $total;
        }

        $output = array(
            'sEcho' => intval($this->params['url']['sEcho']),
            'iTotalRecords' => $total,
            'iTotalDisplayRecords' => $filteredTotal,
            'aaData' => array()
        );

        foreach ($raw_data as $result) {
            $row = array(
                $result['Client']['first_name'],
                $result['Client']['last_name'],
                date('m/d/Y', strtotime(h($result['Client']['DOB']))),
                'DT_RowId' => 'client_' . $result['Client']['id'],
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

        //viewing custom fields
        $customFields = $this->FieldInstance->find('all', array(
            'conditions' => array(
                'client_id' => $this->Client->id
            )
                ));
        $this->set('customFields', $customFields);

        //retrieving and setting custom labels
        $current_user = $this->Auth->user();
        $rawLabels = $this->Lookup->find('all', array(
            'conditions' => array(
                'table_reference' => 'clients',
                'organization_id' => $current_user['organization_id']
            )
                ));

        //making it easier to match labels with respective fields
        $customLabels = $GLOBALS['client_labels'];
        foreach ($rawLabels as $label) {
            $key = $label['Lookup']['field_name'];
            $customLabels[$key] = $label['Lookup']['custom_name'];
        }
        $this->set('customLabels', $customLabels);

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
        $path1 = APP . 'webroot' . DS . 'uploaded_images' . DS . $name . "-" . $id . '.jpg';
        $path2 = APP . 'webroot' . DS . 'uploaded_images' . DS . $name . "-" . $id . '.png';
        $path = "person.png";

        if (file_exists($path1)) {
            $path = "/uploaded_images/" . $name . "-" . $id . ".jpg";
        } else if (file_exists($path2)) {
            $path = "/uploaded_images/" . $name . "-" . $id . ".png";
            ;
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
        //retrieving and setting custom fields
        $current_user = $this->Auth->user();
        $customFields = $this->Field->find('all', array(
            'conditions' => array(
                'table_ref' => 'clients',
                'organization_id' => $current_user['organization_id']
            )
                ));
        $this->set('customFields', $customFields);

        //retrieving and setting custom labels
        $rawLabels = $this->Lookup->find('all', array(
            'conditions' => array(
                'table_reference' => 'clients',
                'organization_id' => $current_user['organization_id']
            )
                ));

        //making it easier to match labels with respective fields
        $customLabels = $GLOBALS['client_labels'];
        foreach ($rawLabels as $label) {
            $key = $label['Lookup']['field_name'];
            $customLabels[$key] = $label['Lookup']['custom_name'];
        }
        $this->set('customLabels', $customLabels);

        if ($this->request->is('post')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'index'));
            }
            $this->Client->create();
            if ($this->Client->save($this->request->data)) {

                //saving all the custom field data
                if (!empty($customFields)) {
                    $data = array('FieldInstance' => array());
                    $i = 0;
                    foreach ($customFields as $customField) {
                        $data['FieldInstance'][$i] = array(
                            'fields_id' => $customField['Field']['id'],
                            'client_id' => $this->Client->id,
                            'field_value' => $this->request->data['Client'][$customField['Field']['field_name']]
                        );

                        $i++;
                    }
                    $this->FieldInstance->saveAll($data['FieldInstance']);
                }
                //logging the add
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "clients", "add", "Added client " . $this->request->data['Client']['first_name'] . " " . $this->request->data['Client']['last_name']);

                $this->Session->setFlash(__('The client details have been saved'));
                if (isset($this->request->data['addMore'])) {
                    $this->redirect(array('controller' => 'client_relations', 'action' => 'add', $this->Client->id));
                } else if (isset($this->request->data['finished'])) {
                    $this->redirect(array('action' => 'view', $this->Client->id));
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

        //retrieving and setting custom fields
        $current_user = $this->Auth->user();
        $customFields = $this->Field->find('all', array(
            'conditions' => array(
                'table_ref' => 'clients',
                'organization_id' => $current_user['organization_id']
            )
                ));
        $this->set('customFields', $customFields);

        //retrieving and setting custom labels
        $rawLabels = $this->Lookup->find('all', array(
            'conditions' => array(
                'table_reference' => 'clients',
                'organization_id' => $current_user['organization_id']
            )
                ));

        //making it easier to match labels with respective fields
        $customLabels = $GLOBALS['client_labels'];
        foreach ($rawLabels as $label) {
            $key = $label['Lookup']['field_name'];
            $customLabels[$key] = $label['Lookup']['custom_name'];
        }
        $this->set('customLabels', $customLabels);

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'view', $id));
            }
            if ($this->Client->save($this->request->data)) {

                //saving all the custom field data
                if (!empty($customFields)) {
                    $data = array('FieldInstance' => array());
                    $i = 0;
                    foreach ($customFields as $customField) {
                        $data['FieldInstance'][$i] = array(
                            'id' => $customField['FieldInstance'][0]['id'],
                            'fields_id' => $customField['Field']['id'],
                            'client_id' => $this->Client->id,
                            'field_value' => $this->request->data['Client'][$customField['Field']['field_name']]
                        );

                        $i++;
                    }
                    $this->FieldInstance->saveAll($data['FieldInstance']);
                }

                //logging the edit
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "clients", "edit", "Edited client " . $this->request->data['Client']['first_name'] . " " . $this->request->data['Client']['last_name']);

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
        $clientName = $this->Client->read(null, $id);
        $clientName = $clientName['Client']['first_name'] . " " . $clientName['Client']['last_name'];

        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }

        $this->Client->set('isDeleted', 1);
        
        //need to delete everything associated with this client
        $associations = $this->Client->find('all', array(
            'conditions' => array(
                'id' => $id)
                ));
        $this->Session->write('associations', $associations);
        //clientchecklists and tasks
        foreach ($associations['ClientChecklist'] as $assocList) {
            $tasks = $this->ClientChecklistTask->find('all', array(
                'conditions' => array(
                    'client_checklist_id' => $assocList['id'])
                    ));

            foreach ($tasks as $task) {
                $taskID = $task['ClientChecklistTask']['id'];
                $this->ClientChecklistTask->query("
                UPDATE client_checklist_tasks
                SET `isDeleted` =  '1' 
                WHERE id = '$taskID'");
            }

            $checklistID = $assocList['id'];
            $this->ClientChecklist->query("
                UPDATE client_checklists
                SET `isDeleted` =  '1' 
                WHERE id = '$checklistID'");
        }
        
        //client relatives
        foreach ($associations['ClientRelation'] as $assocRelative) {
            $relativeID = $assocRelative['id'];
            $this->ClientRelation->query("
                UPDATE client_relations
                SET `isDeleted` =  '1' 
                WHERE id = '$relativeID'");
        }
        
        //resource uses
        foreach ($associations['ResourceUs'] as $assocUsage) {
            $usageID = $assocUsage['id'];
            $this->ResourceUs->query("
                UPDATE resource_uses
                SET `isDeleted` =  '1' 
                WHERE id = '$usageID'");
        }
        
        //prayer requests
        foreach ($associations['PrayerRequest'] as $assocRequest) {
            $prayerID = $assocRequest['id'];
            $this->ResourceUs->query("
                UPDATE prayer_requests
                SET `isDeleted` =  '1' 
                WHERE id = '$prayerID'");
        }
        
        if ($this->Client->save()) {

            //logging the delete
            $lControl = new LoggersController();
            $lControl->add($this->Auth->user(), "clients", "delete", "Deleted client " . $clientName);

            $this->Session->setFlash(__('Client deleted'));
            $this->redirect(array('action' => 'index'));
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

    /**
     * This method prints off the little hope project cards that Mission 
     * Columbia requested we print off
     * 
     * @param type $id
     * @throws NotFoundException 
     */
    public function printCards($id = null) {
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

<?php

App::uses('OrganizationsController', 'Controller');
App::uses('AppController', 'Controller');
App::uses('ClientsController', 'Controller');
App::uses('LoggersController', 'Controller');

$GLOBALS['resource_labels'] = array(
    'Resource Name' => 'Resource Name',
    'Resource Type' => 'Resource Type',
    'Description' => 'Description',
    'Inventory' => 'Inventory',
    'Resource Status' => 'Resource Status',
    'Street Address' => 'Street Address',
    'City' => 'City',
    'State' => 'State',
    'Zip' => 'Zip'
);

/**
 * Resources Controller
 *
 * @property Resource $Resource
 */
class ResourcesController extends AppController {

    public $uses = array("Resource", "Client", "ResourceType", "Field", "FieldInstance", "Lookup");

    /**
     * index method
     *
     * @return void
     */
    public function index() {

        $orgCont = new OrganizationsController();
        $result = $orgCont->giveMeAddresses();

        $this->set('theResult', $result);

        $this->Resource->recursive = 0;
        $this->set('resources', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Resource->id = $id;
        if (!$this->Resource->exists()) {
            throw new NotFoundException(__('Invalid resource'));
        }

        $resource = $this->Resource->read(null, $id);
        $this->set('resource', $resource);

        //viewing custom fields
        $customFields = $this->FieldInstance->find('all', array(
            'conditions' => array(
                'resource_id' => $this->Resource->id
            )
                ));
        $this->set('customFields', $customFields);

        //retrieving and setting custom labels
        $current_user = $this->Auth->user();
        $rawLabels = $this->Lookup->find('all', array(
            'conditions' => array(
                'table_reference' => 'resources',
                'organization_id' => $current_user['organization_id']
            )
                ));

        //making it easier to match labels with respective fields
        $customLabels = $GLOBALS['resource_labels'];
        foreach ($rawLabels as $label) {
            $key = $label['Lookup']['field_name'];
            $customLabels[$key] = $label['Lookup']['custom_name'];
        }
        $this->set('customLabels', $customLabels);

        $resourceUseWithClientName = array();
        $i = 0;
        foreach ($resource['ResourceUs'] as $resourceUse) {
            $clientID = $resourceUse['client_id'];
            $clientName = $this->Client->query("Select first_name, last_name from clients where id = $clientID");
            $resourceUseWithClientName[$i]['clientName'] = $clientName[$i]['clients']['first_name'] . " " . $clientName[$i]['clients']['last_name'];
            $resourceUseWithClientName[$i]['date'] = $resourceUse['date'];
            $resourceUseWithClientName[$i]['comments'] = $resourceUse['comments'];
            $resourceUseWithClientName[$i]['id'] = $resourceUse['id'];
        }

        $this->set('resourceUse', $resourceUseWithClientName);
        $path = ClientsController::giveMePath('Resource', $id);
        $this->set('imagePath', $path);
        $this->set('remotePath', preg_quote("'" . APP . 'webroot' . DS . 'uploaded_images' . "'"));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($organizationID = null) {

        //retrieving and setting custom fields
        $current_user = $this->Auth->user();
        $customFields = $this->Field->find('all', array(
            'conditions' => array(
                'table_ref' => 'resources',
                'organization_id' => $current_user['organization_id']
            )
                ));
        $this->set('customFields', $customFields);

        //retrieving and setting custom labels
        $current_user = $this->Auth->user();
        $rawLabels = $this->Lookup->find('all', array(
            'conditions' => array(
                'table_reference' => 'resources',
                'organization_id' => $current_user['organization_id']
            )
                ));

        //making it easier to match labels with respective fields
        $customLabels = $GLOBALS['resource_labels'];
        foreach ($rawLabels as $label) {
            $key = $label['Lookup']['field_name'];
            $customLabels[$key] = $label['Lookup']['custom_name'];
        }
        $this->set('customLabels', $customLabels);

        if ($this->request->is('post')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'index'));
            }
            $this->request->data['Resource']['organization_id'] = $organizationID;
            $this->Resource->create();
            if ($this->Resource->save($this->request->data)) {

                //saving all the custom field data
                $data = array('FieldInstance' => array());
                $i = 0;
                if (!empty($customFields)) {
                    foreach ($customFields as $customField) {
                        $data['FieldInstance'][$i] = array(
                            'fields_id' => $customField['Field']['id'],
                            'resource_id' => $this->Resource->id,
                            'field_value' => $this->request->data['Resource'][$customField['Field']['field_name']]
                        );

                        $i++;
                    }
                    $this->FieldInstance->saveAll($data['FieldInstance']);
                }

                //logging the adding of a resource
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "resources", "add", "Added Resource " . $this->request->data['Resource']['resource_name']);

                $this->Session->setFlash(__('The resource has been saved'));
                if (isset($this->request->data['Add_another_resource'])) {
                    $this->redirect(array('action' => 'add', $organizationID));
                } else if (isset($this->request->data['finished'])) {
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->Session->setFlash(__('The resource could not be saved. Please, try again.'));
            }
        }
        $resourceTypes = $this->ResourceType->find('list');
        $this->set(compact('resourceTypes'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null, $organizationID = null) {
        $this->Resource->id = $id;
        $this->set('organizationID', $organizationID);
        if (!$this->Resource->exists()) {
            throw new NotFoundException(__('Invalid resource'));
        }

        //retrieving and setting custom fields
        $current_user = $this->Auth->user();
        $customFields = $this->Field->find('all', array(
            'conditions' => array(
                'table_ref' => 'resources',
                'organization_id' => $current_user['organization_id']
            )
                ));
        $this->set('customFields', $customFields);

        //retrieving and setting custom labels
        $current_user = $this->Auth->user();
        $rawLabels = $this->Lookup->find('all', array(
            'conditions' => array(
                'table_reference' => 'resources',
                'organization_id' => $current_user['organization_id']
            )
                ));

        //making it easier to match labels with respective fields
        $customLabels = $GLOBALS['resource_labels'];
        foreach ($rawLabels as $label) {
            $key = $label['Lookup']['field_name'];
            $customLabels[$key] = $label['Lookup']['custom_name'];
        }
        $this->set('customLabels', $customLabels);

        if ($this->request->is('post') || $this->request->is('put')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'view', $id));
            }
            if ($this->Resource->save($this->request->data)) {

                //saving all the custom field data
                if (!empty($customFields)) {
                    $data = array('FieldInstance' => array());
                    $i = 0;
                    foreach ($customFields as $customField) {
                        $data['FieldInstance'][$i] = array(
                            'id' => $customField['FieldInstance'][0]['id'],
                            'fields_id' => $customField['Field']['id'],
                            'resource_id' => $this->Resource->id,
                            'field_value' => $this->request->data['Resource'][$customField['Field']['field_name']]
                        );

                        $i++;
                    }
                    $this->FieldInstance->saveAll($data['FieldInstance']);
                }

                //logging the editing of a resource
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "resources", "edit", "Edited Resource " . $this->request->data['Resource']['resource_name']);

                $this->Session->setFlash(__('The resource has been saved'));
                if (isset($this->request->data['finished'])) {
                    $this->redirect(array('action' => 'view', $id));
                }
            } else {
                $this->Session->setFlash(__('The resource could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Resource->read(null, $id);
        }
        $resourceTypes = $this->ResourceType->find('list');
        $this->set(compact('resourceTypes'));
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

        $this->Resource->id = $id;
        $resourceName = $this->Resource->read(null, $id);
        $resourceName = $resourceName['Resource']['resource_name'];

        if (!$this->Resource->exists()) {
            throw new NotFoundException(__('Invalid resource'));
        }
        if ($this->Resource->delete()) {

            //logging the deleting of a resource
            $lControl = new LoggersController();
            $lControl->add($this->Auth->user(), "resources", "delete", "Deleted Resource " . $resourceName);

            $this->Session->setFlash(__('Resource deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Resource was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * Lee: Report functions 
     */
    public function count() {
        return $this->Resource->find('count');
    }

}

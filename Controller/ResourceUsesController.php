<?php

App::uses('AppController', 'Controller');
App::uses('LoggersController', 'Controller');

/**
 * Resourceuses Controller
 *
 * @property Resourceus $Resourceus
 */
class ResourceUsesController extends AppController {

    public $uses = array("ResourceUs", "Organization", "Resource");

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->ResourceUs->id = $id;
        if (!$this->ResourceUs->exists()) {
            throw new NotFoundException(__('Invalid resource use'));
        }
        $this->set('resourceUs', $this->ResourceUs->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($clientID = null) {

        if ($this->request->is('post')) {
            if (isset($this->request->data['cancel'])) {
                $this->redirect(array('controller' => 'clients', 'action' => 'view', $clientID));
            }

            $this->request->data['ResourceUs']['client_id'] = $clientID;
            $this->ResourceUs->create();
            $this->ResourceUs->client_id = $clientID;
            if ($this->ResourceUs->save($this->request->data)) {

                $clientName = $this->ResourceUs->Client->read(null, $clientID);
                $clientName = $clientName['Client']['first_name'] . " " . $clientName['Client']['last_name'];
                $resourceID = $this->ResourceUs->id;
                $resourceName = $this->ResourceUs->read(null, $resourceID);
                $date = $resourceName['ResourceUs']['date'];
                $resourceName = $resourceName['Resource']['resource_name'];

                //logging the add
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "Resource Uses", "add", "Added Resource Use for Client " . $clientName . " using resource " . $resourceName . " on " . $date);

                $this->Session->setFlash(__('The resource use has been saved'));
                if (isset($this->request->data['Add_another_resource'])) {
                    $this->redirect(array('action' => 'add', $clientID));
                } else if (isset($this->request->data['finished'])) {
                    $this->redirect(array('controller' => 'clients', 'action' => 'view', $clientID));
                }
            } else {
                $this->Session->setFlash(__('The resource use could not be saved. Please, try again.'));
            }
        }
        $clients = $this->ResourceUs->Client->find('list');
        $organizations = $this->Organization->find('list');
        $this->set(compact('clients', 'organizations'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->ResourceUs->id = $id;
        if (!$this->ResourceUs->exists()) {
            throw new NotFoundException(__('Invalid resource use'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            
             if (isset($this->request->data['cancel'])) {
                $this->redirect(array('action' => 'view', $id));
            }
            
            if ($this->ResourceUs->save($this->request->data)) {

                $resourceUse = $this->ResourceUs->read(null, $id);
                $clientName = $resourceUse['Client']['first_name'] . " " . $resourceUse['Client']['last_name'];
                $date = $resourceUse['ResourceUs']['date'];
                $resourceName = $resourceUse['Resource']['resource_name'];

                //logging the add
                $lControl = new LoggersController();
                $lControl->add($this->Auth->user(), "Resource Uses", "edit", "Edited Resource Use for Client " . $clientName . " using resource " . $resourceName . " on " . $date);

                $this->Session->setFlash(__('The resource use has been saved'));
                $this->redirect(array('action' => 'view', $id));
            } else {
                $this->Session->setFlash(__('The resource use could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->ResourceUs->read(null, $id);
        }
        $clients = $this->ResourceUs->Client->find('list');
        $organizations = $this->Organization->find('list');
        $selected_organization = $this->request->data['Resource']['organization_id'];
        $resources = $this->Resource->find('list', array('conditions' => array('Resource.organization_id' => $selected_organization)));
        $selected_resource = $this->request->data['Resource']['id'];
        $this->set(compact('clients', 'organizations', 'resources'));
        $this->set('selected_organization', $selected_organization);
        $this->set('selected_resource', $selected_resource);
        $this->set('resourceID', $id);
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
        $this->ResourceUs->id = $id;
        if (!$this->ResourceUs->exists()) {
            throw new NotFoundException(__('Invalid resourceus'));
        }

        $resourceUse = $this->ResourceUs->read(null, $id);
        $clientName = $resourceUse['Client']['first_name'] . " " . $resourceUse['Client']['last_name'];
        $date = $resourceUse['ResourceUs']['date'];
        $resourceName = $resourceUse['Resource']['resource_name'];

        $this->ResourceUs->set('isDeleted', 1);
        if ($this->ResourceUs->save()) {

            //logging the delete
            $lControl = new LoggersController();
            $lControl->add($this->Auth->user(), "Resource Uses", "delete", "Deleted " . $clientName . "'s Resource Use for resource ".$resourceName." on ".$date);

            $this->Session->setFlash(__('Resource use deleted'));
            $this->redirect(array('controller' => 'clients', 'action' => 'view', $resourceUse['Client']['id']));
        }
        $this->Session->setFlash(__('Resource use was not deleted'));
        $this->redirect(array('controller' => 'clients', 'action' => 'index'));
    }

    /**
     * Lee: Report functions 
     */
    public function countPeriod($startDate, $endDate) {
        $query = $this->ResourceUse->query("
                Select count(DISTINCT resource_uses.id) as period
                From resource_uses join clients
                Where date between '$startDate' AND '$endDate';
            ");
        return $query[0][0]['period'];
    }

    public function countParticular($resourceID, $startDate, $endDate) {
        $query = $this->ResourceUse->query("
                Select count(resource_id) as count
                From resource_uses
                Where resource_id = '$resourceID' AND date between '$startDate' and '$endDate';
            ");
        return $query[0][0]['count'];
    }

}

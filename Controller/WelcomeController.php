<?php

App::uses('OrganizationsController', 'Controller');
App::uses('AppController', 'Controller');

class WelcomeController extends AppController {

    public $helpers = array('GoogleMap');   //Adding the helper

	public $components = array('RequestHandler', 'Auth');
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow(array('instructions'));
	}
	
    public function index() {

        $orgCont = new OrganizationsController();
        $result = $orgCont->giveMeAddresses();

        $this->set('theResult', $result);

        $uResources = $orgCont->giveMeUniqueResources();

        //var_dump($uResources);

        $this->set('theUResources', $uResources);

        /*
          echo '<pre>';
          print_r($result);
          echo '</pre>';
         */
        //have fun!! :) -- Lee
        //$address = $this->Session->read('address_one');
    }
    
    public function instructions()
    {
    	if( isset($_SERVER['REDIRECT_HTTPS']) )
    		$this->redirect(array('action' => 'index'));
    }

}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.

  could write a view that would return KML (xml, but a certain syntax)

  just say organizationconrtroler::givemeaddresses.
 */
?>

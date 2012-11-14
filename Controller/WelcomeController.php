<?php

App::uses('OrganizationsController', 'Controller');
App::uses('AppController', 'Controller');

class WelcomeController extends AppController {

    public $helpers = array('GoogleMap');   //Adding the helper
<<<<<<< HEAD
	public $components = array('RequestHandler');
	public function beforeFilter()
	{
		parent::beforeFilter();
	}
=======
    public $components = array('RequestHandler');

>>>>>>> 47ef8eca1cb10202a209e47ab91c0ca7a633c25f
    public function index() {

        $orgCont = new OrganizationsController();
        $result = $orgCont->giveMeAddresses();

        $this->set('theResult', $result);
        /*
          echo '<pre>';
          print_r($result);
          echo '</pre>';
         */
        //have fun!! :) -- Lee
        //$address = $this->Session->read('address_one');
    }

}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.

  could write a view that would return KML (xml, but a certain syntax)

  just say organizationconrtroler::givemeaddresses.
 */
?>

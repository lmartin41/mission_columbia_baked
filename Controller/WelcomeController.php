<?php

App::uses('OrganizationsController', 'Controller');
App::uses('AppController', 'Controller');



class WelcomeController extends AppController {

    
    public $helpers = array('GoogleMap');   //Adding the helper

    public function index() {
    	$organizationsController = new OrganizationsController();

    	$address = $this->Session->read('address_one');


        
    }
}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.

 could write a view that would return KML (xml, but a certain syntax)

 just say organizationconrtroler::givemeaddresses.
 */
?>

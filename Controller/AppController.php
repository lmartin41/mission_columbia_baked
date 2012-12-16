<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    /**
     * Lee: User authorization code
     * Sets the path to where the user goes after logging in/out, and 
     * sets an authorization failed message.
     */
    public $components = array(
        'Session',
        'Auth'=>array(
            'loginRedirect'=>array('controller'=>'welcome', 'action'=>'index'),
            'logoutRedirect'=>array('controller'=>'welcome', 'action'=>'index'),
            'authError'=>"You can't access that page",
            'authorize'=>array('Controller')
        ),
    	'Security'
    );
    
    public $uses = array('Tip');
    
    public $pageCatalog = array(
    	'controllers' => array(
    		'ClientChecklists', 
    		'ClientChecklistTasks',
    		'ClientRelations',
    		'Clients',
    		'Customize',
    		'Feedbacks',
    		'Global',
    		'Organizations',
    		'PrayerRequests',
    		'Reports',
    		'Resources',
    		'ResourceUses',
    		'Users',
    		'VolunteerInformationForms',
    		'Welcome'
    	),
    	'views' => array(
    		'ClientChecklists' => array(
    			'add',
    			'edit',
    			'index',
    			'view'
    		),
    		'ClientChecklistTasks' => array(
    			'add',
    			'edit',
    			'view'
    		),
    		'ClientRelations' => array(
    			'add',
    			'edit',
    			'view'		
    		),
    		'Clients' => array(
    			'add',
    			'browse',
    			'edit',
    			'index',
    			'search_results',
    			'view'		
    		),
    		'Customize' => array(
    			'index'
    		),
    		'Feedbacks' => array(
    			'add',
    			'edit',
    			'index',
    			'view'
    		),
    		'Global' => array(
    			'login'		
    		),
    		'Organizations' => array(
    			'add',
    			'edit',
    			'index',
    			'view'
    		),
    		'PrayerRequests' => array(
    			'add',
    			'edit',
    			'index',
    			'view'
    		),
    		'Reports' => array(
    			'client_report_search',
    			'client_report',
    			'counts_index',
    			'counts',
    			'index',
    			'lists_index',
    			'lists',
    			'resource_index',
    			'resource_report',		
    		),
    		'Resources' => array(
    			'add',
    			'edit',
    			'index',
    			'view'
    		),
    		'ResourceUses' => array(
    			'add',
    			'edit',
    			'view'		
    		),
    		'Users' => array(
    			'add',
    			'edit',
    			'edit_password',
    			'index',
    			'view'	
    		),
    		'VolunteerInformationForms' => array(
    			'add',
    			'edit',
    			'view'		
    		),
    		'Welcome' => array(
    			'index'	
    		)
    	)
    );
    /**
     * Lee: this function checks to see if a user is authorized
     * 
     * @param type $user The user to be authorized
     */
    public function isAuthorized($user) {
        return true;
    }
    
    public $start_time;
    public function beforeFilter() {
    	$this->start_time = microtime(true);
    	$this->Security->blackHoleCallback = 'forceSSL';
        $this->set('logged_in', $this->Auth->loggedIn());
        $this->set('current_user', $this->Auth->user());
        $authUser = $this->Auth->user();
        $this->set('isAtleastAdmin', $authUser['isAdmin'] || $authUser['isSuperAdmin']);
    }
    
    public function forceSSL()
    {
    	if( !isset($_SERVER['REDIRECT_HTTPS']) )
    		$this->redirect('https://' . $_SERVER['SERVER_NAME'] . $this->here);
    }
    
    /**
     * Brett: This code figures out if there is a tip that needs to be render on a given page.
     */
    
    public function beforeRender()
    {
    	$tip = null;
    	
    	//special case for the log in screen
    	if( $this->name == 'Users' && $this->action == 'login' )
    	{
    		$conditions = array('AND' => array(
    				'Tip.controller' => 'Global',
    				'Tip.view' => $this->action,
    				'Tip.isDeleted' => false
    		));
    		
    		$tip = $this->Tip->find('first', array('conditions' => $conditions));
    	}
    	elseif( $this->name != 'CakeError' )
    	{
	    	$conditions = array('AND' => array(
	    			'Tip.controller' => $this->name, 
	    			'Tip.view' => $this->action, 
	    			'Tip.isDeleted' => false
	    			));
	    	$tip = $this->Tip->find('first', array('conditions' => $conditions, 'recursive' => -1, 'fields' => array('Tip.tip')));
    	}
    	$this->set('tip_render', $tip['Tip']['tip']);
    }
    
    public function afterFilter()
    {
    	//Uncomment to log response times
    	/*$final_time = microtime(true) - $this->start_time;
    	$fh = fopen('time_log.dat', 'a');
    	fwrite($fh, "It took " . $final_time ."s to execute " . $this->name . "->" . $this->action . "\n");
    	fclose($fh);*/
    }
}

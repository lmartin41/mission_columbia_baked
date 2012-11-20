<?php
require_once('../Vendor/Spyc.php');

class CustomizeController extends AppController
{
	//public $uses = null;
	public $name = 'Customize';
	
	public function beforeFilter()
	{
		$this->Auth->authorize = 'Controller';
		parent::beforeFilter();
	}
	
	public function isAuthorized($user)
	{
		if( !($user['isSuperAdmin'] || $user['isAdmin']) )
		{
			return false;
		}
	
		return parent::isAuthorized($user);
	}
	
	public function index()
	{
		$cur_user = $this->Auth->user();
		if( $cur_user['isSuperAdmin'] )
		{
			//get yaml customization options
			$options = Spyc::YAMLLoad('customize.yml');
			
			//check for get parameters
			if( isset( $this->params['url']['doc']) )
			{
				if( $this->params['url']['doc'] == 'off' )
				{
					$options['options']['georgia_tech_ssl_documentation'] = false;
				}
				elseif( $this->params['url']['doc'] == 'on' )
				{ 
					$options['options']['georgia_tech_ssl_documentation'] = true;
				}
				
				$file = fopen('customize.yml', 'w');
				fwrite($file, Spyc::YAMLDump($options));
				fclose($file);
			}
			
			$this->set('options', $options['options']);
		}
	}
}
?>
<?php

App::uses('AppController', 'Controller');

class FrameworkDetailsController extends AppController
{
	public $uses = array(); // no model
	public $components = array('RequestHandler');
	
	public function views($controller = null)
	{
		if( $controller == null || trim($controller) == '' )
		{
			$views = $this->pageCatalog['views'];
		}
		else
		{
			$error = false;
			if( is_numeric($controller) )
			{
				if( isset($this->pageCatalog['controllers'][$controller]) )
				{
					$controller = $this->pageCatalog['controllers'][$controller];
				}
				else
				{
					$error = true;
				}
			}
			
			if( ! isset($this->pageCatalog['views'][$controller]) )
			{
				$error = true;
			}
			
			if( ! $error )
			{
				$views = $this->pageCatalog['views'][$controller];
			}
			else
			{
				$views = array(
					'Error' => array(
						'message' => 'According to our records this controller either doesn\'t exist or it is not editable.',
						'time' => date('G:i:s', time())
					)
				);
			}
		}
		
		$this->set('views', $views);
	}
}
?>
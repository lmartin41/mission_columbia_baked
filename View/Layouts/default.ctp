<?php
/**
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
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
//users, clients, feeback, help(go nowhere), reports(go nowhere), resources, Admin(go nowhere) 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __('Mission Columbia:'); ?>
		<?php echo $title_for_layout; ?>
	</title>

	<?php echo $this->Html->script('jquery-1.8.2.min.js'); ?>
	<?php echo $this->Html->script('jquery-ui-1.9.0.custom.min.js'); ?>
	<?php echo $this->Html->script('Menu.js'); ?>

	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->css('jquery-ui-1.9.0.custom.min');
		echo $this->Html->css('styles');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1 style="text-align: right;"><?php echo $this->Html->link(__('Mission Columbia: Data Entry & Resource Tracking'), 'http://cakephp.org'); ?></h1>
	

			<div id="outer">
				<div id="radio">
			        <input type="radio" id="radio1" name="radio" /><label for="radio1">Users</label>
			        <input type="radio" id="radio2" name="radio" /><label for="radio2">Clients</label>
			        <input type="radio" id="radio3" name="radio" /><label for="radio3">Resources</label>
                                <input type="radio" id="radio35" name="radio" /><label for="radio35">Organizations</label>
			        <input type="radio" id="radio4" name="radio" /><label for="radio4">Reports</label>
			        <input type="radio" id="radio5" name="radio" /><label for="radio5">Feedbacks</label>
			        <input type="radio" id="radio6" name="radio" /><label for="radio6">Admin</label>
			        <input type="radio" id="radio7" name="radio" /><label for="radio7">Help</label>
			    </div>
			</div>

		</div>
		<div id="content">
                    
                    <?php
                        /****************************************** 
                         *  Lee: this snippet below fixes the "login"/"logout"
                         *  message in the top right hand corner of every page
                         ******************************************/
                    ?>
                    <div style="text-align: right;">
                        <?php if($logged_in): ?>
                            Welcome <?php echo $current_user['username']; ?>.  
                            <script>
                            	jQuery(document).ready(function(){  
                            		//jQuery('#radio').toggle();
                            	});
                            </script>
                            <?php echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout')); ?>
                        <?php else: ?>
                            <?php echo $this->Html->link('Login', array('controller'=>'users', 'action'=>'login')); ?>
                            <script>
                            	jQuery(document).ready(function(){  
                            		//jQuery('#radio').toggle();
                            	});
                            </script>
                        <?php endif; ?>
                    </div>
                    
                    <?php /***********************************/ ?>

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php //echo $this->Html->link(
					//$this->Html->image('cake.power.gif', array('alt' => __('CakePHP: the rapid development php framework'), 'border' => '0')),
				//	'http://www.cakephp.org/',
					//array('target' => '_blank', 'escape' => false)
				//);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>

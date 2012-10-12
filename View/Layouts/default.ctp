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
			<ul id="top_links" class="do_not_show">
				<?php if( $isAtleastAdmin ): ?>
					<li><input type="radio" id="radio1" name="radio" /><label for="radio1">Users</label></li>
				<?php endif;?>
			    <li><input type="radio" id="radio2" name="radio" /><label for="radio2">Clients</label></li>
			    <li><input type="radio" id="radio3" name="radio" /><label for="radio3">Resources</label></li>
                <li><input type="radio" id="radio4" name="radio" /><label for="radio4">Organizations</label></li>
			    <li><input type="radio" id="radio5" name="radio" /><label for="radio5">Reports</label></li>
			    <?php if( $isAtleastAdmin ): ?>
			    	<li><input type="radio" id="radio7" name="radio" /><label for="radio7">Admin</label></li>
			    <?php endif; ?>
			    <li><input type="radio" id="radio8" name="radio" /><label for="radio8">Help</label></li>
			</ul>

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
                            		jQuery('#top_links').removeClass('do_not_show');
                            	});
                            </script>
                            <?php echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout')); ?>
                        <?php endif; ?>
                    </div>
                    
                    <?php /***********************************/ ?>

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		<p>We would appreciate your <?php echo $this->Html->link('Feedback', array('controller'=>'feedbacks', 'action'=>'index')) ?></p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>

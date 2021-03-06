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
        <?php echo $this->Html->script('global'); ?>
        <?php echo $this->Html->script('NavActions.js'); ?>

        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('cake.generic');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->Html->css('jquery-ui-1.9.0.custom.min');
        echo $this->Html->css('styles');
        echo $this->fetch('script');
        echo $this->Html->script("toggle.js");
        ?>

        
    </head>
    
    <body>
         

        <div id="container">

            <div id="header">
                <?php 
                	if ($logged_in)
                	{	
                		echo $this->Html->image('mission_logo.png', array(
                			'alt' => 'logo',
                			'url' => array('controller' => 'welcome', 'action' => 'index')
                		));
                	}
                	else
                	{
                		echo $this->Html->image('mission_logo.png', array('alt' => 'logo'));
                	}
                ?>

                <?php
                /*  * **************************************** 
                 *  Lee: this snippet below fixes the "login"/"logout"
                 *  message in the top right hand corner of every page
                 * **************************************** */
                ?>
                <div style="text-align: right; float: right;">
                    <?php if ($logged_in): ?>
                        Currently Logged in as: <?php echo $current_user['username']; ?> | 
                        <?php echo $this->Html->link('Edit Profile', array('controller' => 'users', 'action' => 'edit', $current_user['id'])); ?> | 
                        <script>
                            jQuery(document).ready(function(){  
                                jQuery('#top_links').removeClass('do_not_show');
                            });
                        </script>
                        <?php echo $this->Html->link('Sign Out', array('controller' => 'users', 'action' => 'logout')); ?>
                    <?php endif; ?>
                </div>

                <?php /*                 * *************************************************** */ ?>

           

    
                <h1>&nbsp;</h1>
                <ul id="top_links" class="do_not_show">
                    <li><input type="radio" id="radio2" name="radio" /><label for="radio2">Clients</label></li>
                    <li><input type="radio" id="radio3" name="radio" /><label for="radio3">Resources</label></li>
                    <li><input type="radio" id="radio4" name="radio" /><label for="radio4">Organizations</label></li>
                    <li><input type="radio" id="radio5" name="radio" /><label for="radio5">Reports</label></li>
                    <?php if ($isAtleastAdmin): ?>
                        <li><input type="radio" id="radioUsers" name="radioUsers" /><label for="radioUsers">Users</label></li>
                        <li><input type="radio" id="radioCustomize" name="radioCustomize" /><label for="radioCustomize">Configure</label></li>
                    <?php endif; ?>
                </ul>

            </div>

            <div id="bodyContainer" style="width:100%; ">
                <div id="content" style="width:97%;float:left; border-radius: 5px;">
                    <?php echo $this->Session->flash(); ?>

                    <?php echo $this->fetch('content'); ?>
					<div id="tipArea">
					<?php if( isset( $tip_render ) && $tip_render != null ): ?>
                        <div id="tips" class="tipsBox">
                            <div class="tipsContent">
                                <p id="tip_header">Tips</p>
                                <!--<p>If you cannot remember your password, please talk to your organizations administrator to change it.</p> -->
                                <?php echo $tip_render; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="clear"></div>

                
            
            </div>
            <div id="footer" style="text-align: center; margin-left:auto; margin-left:auto;">
                <?php if ($logged_in): ?>
                    We would appreciate your <?php echo $this->Html->link('Feedback', array('controller' => 'feedbacks', 'action' => 'add')); ?> | 
                    <a href="javascript:toggle('22');">Contact</a> |
                    <?php echo $this->Html->link('Home', array('controller' => 'welcome', 'action' => 'index')); ?>
                    <p id ="22" style ="display: none">
                        <br />Mission Columbia 
                        <br />2723 Ashland Rd.
                        <br />Columbia, SC 29210
                        <br /><a href="mailto:test@test.com">Send e-mail to Mission Columbia</a>
                    </p>

                <?php endif; ?>
            </div>
        </div>
        <?php echo $this->element('sql_dump'); ?>
        <div class="do_not_show">
            <?php echo $this->Html->link('Resources', array('controller' => 'resources', 'action' => 'index'), array('id' => 'resources')); ?>
            <?php echo $this->Html->link('Organizations', array('controller' => 'organizations', 'action' => 'index'), array('id' => 'organizations')); ?>
            <?php echo $this->Html->link('Reports', array('controller' => 'reports', 'action' => 'index'), array('id' => 'reports')); ?>
            <?php echo $this->Html->link('Users', array('controller' => 'users', 'action' => 'index'), array('id' => 'users')); ?>
            <?php echo $this->Html->link('Customize', array('controller' => 'customize', 'action' => 'index'), array('id' => 'customize')); ?>
        </div>
    </body>
</html>
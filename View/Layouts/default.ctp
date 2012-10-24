<?php echo $this->Html->script("toggle.js", FALSE); ?>

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
        <?php echo $this->Html->script('NavActions.js'); ?>

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


    <!-- LEE: Sorry - commented until we can figure out how to move tips box
    <head>    
    <?php //echo $this->Html->charset(); ?>
        <title>
    <?php //echo __('Mission Columbia:'); ?>
    <?php //echo $title_for_layout; ?>
        </title>

    <?php //echo $this->Html->script('jquery-1.8.2.min.js'); ?>
    <?php //echo $this->Html->script('jquery-ui-1.9.0.custom.min.js'); ?>
    <?php //echo $this->Html->script('Menu.js'); ?>
    <?php //echo $this->Html->script('ajaxupload-min.js'); ?>

    <?php /*
      echo $this->Html->meta('icon');
      echo $this->Html->css('cake.generic');
      echo $this->fetch('meta');
      echo $this->fetch('css');
      echo $this->Html->css('jquery-ui-1.9.0.custom.min');
      echo $this->Html->css('styles');
      echo $this->Html->css('baseTheme.style');
      echo $this->fetch('script'); */
    ?>

         call a js function here to check for context of the URL, then alter the tip content accordingly. 
        

        <div id="tips" class="tipsBox" style="width:15%;position:absolute;right:5%;top:5%;background:#B4CFEC;border: 1px solid #000000;padding: 10 10 10 10">
            <div class="tipsContent">
                <B>Tips Default</B>
    <!-- <br><br>
    <p>If you cannot remember your password, please click on the <B>Request a New Password</B> link and a new, temporary password will be sent to your email address.</p> 
    
</div>
</div>

<script>
checkContext();
</script>

<tr>
<td>
    <div id="demo1" style="width:500px"></div>
    <script type="text/javascript">
    $('#demo1').ajaxupload({
        url:'upload.php',
        remotePath:'uploaded/',
    });
    </script>
</td>

</tr> 

</head>
    -->
    
    <body>
         

        <div id="container">

            <div id="header">
                <?php echo $this->Html->image('mission_logo.png'); ?>

                <?php
                /*  * **************************************** 
                 *  Lee: this snippet below fixes the "login"/"logout"
                 *  message in the top right hand corner of every page
                 * **************************************** */
                ?>
                <div style="text-align: right; float: right;">
                    <?php if ($logged_in): ?>
                        Currently Logged in as: <?php echo $current_user['username']; ?> | 
                        <?php echo $this->Html->link('Edit Profile', array('controller' => 'users', 'action' => 'edit')); ?> | 
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
                        <li><input type="radio" id="radio7" name="radio" /><label for="radio7">Admin</label></li>
                    <?php endif; ?>
                </ul>

            </div>

            <div id="bodyContainer" style="width:100%;">
                

                <div id="content" style="width:85%;float:left;">

                    <?php echo $this->Session->flash(); ?>

                    <?php echo $this->fetch('content'); ?>
                </div>

                <div id="tipArea" style="width:11%; background:#B4CFEC; float:right;">
                    
    <!--  OLD STYLES               <div id="tips" class="tipsBox" style="float:right; position:relative; left:1%; bottom:1%; width:15%; background:#B4CFEC;border: 1px solid #000000;"> -->
                    <div id="tips" class="tipsBox" style="background:#B4CFEC;border: 1px solid #000000;">
                        <div class="tipsContent">
                            <B>Tips Default</B>
                            <p>If you cannot remember your password, please click on the <B>Request a New Password</B> link and a new, 
                        </div>
                    </div>

                </div>
            
            </div>

            <!-- This has to happen AFTER the tipsBox is rendered -->
            <script>
                checkContext();
            </script>

            <div id="footer" style="text-align: center; float:left;">
                <?php if ($logged_in): ?>
                    We would appreciate your <?php echo $this->Html->link('Feedback', array('controller' => 'feedbacks', 'action' => 'add')); ?> |
                    <a>Help</a> | 
                    <a onclick="return toggle('22');">Contact Mission Columbia</a>
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
            <?php echo $this->Html->link('Clients', array('controller' => 'clients', 'action' => 'index'), array('id' => 'clients')); ?>
            <?php echo $this->Html->link('Resources', array('controller' => 'resources', 'action' => 'index'), array('id' => 'resources')); ?>
            <?php echo $this->Html->link('Organizations', array('controller' => 'organizations', 'action' => 'index'), array('id' => 'organizations')); ?>
            <?php echo $this->Html->link('Reports', array('controller' => 'reports', 'action' => 'index'), array('id' => 'reports')); ?>
            <?php echo $this->Html->link('Admin', array('controller' => 'admin', 'action' => 'index'), array('id' => 'admin')); ?>
        </div>
    </body>
</html>
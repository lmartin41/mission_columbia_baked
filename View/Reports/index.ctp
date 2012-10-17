<h2>Clients</h2>
<?php echo $this->Html->link('Client Listing', array('controller' => 'clients', 'action' => 'browse')); ?>
<br />
Number of clients: <?php //echo $numClients; ?>
<br /><br />
<h2>Organizations</h2>
<?php echo $this->Html->link('Organization Listing', array('controller' => 'organizations', 'action' => 'index')); ?>
<br />
Number of organizations:
<br /><br />
<h2>Resources</h2>
<?php echo $this->Html->link('Resources Listing', array('controller' => 'resources', 'action' => 'index')); ?>
<br />
Number of resources:

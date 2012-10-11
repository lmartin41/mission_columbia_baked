<h2>Search Results</h2>
<br /><br />
<?php
    if ($results == null):
        echo 'No results Found';  
?>
<br /><br />
<?php echo $this->Html->link('Client Listing', array('action'=>'index')); ?>
<br /><br />
<?php echo $this->Html->link('Search Again', array('action'=>'search'));?>
<?php
    else: echo $this->Html->link($results['Client']['first_name'].' '.$results['Client']['last_name'], 
        array('action'=>'view', $results['Client']['id']));
?> 
<?php endif; ?>
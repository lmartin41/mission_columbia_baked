<h2>Search Results</h2>
<br />
<?php
    if ($results == null):
        echo 'No results Found';  
?>
<br /><br />
<?php echo $this->Html->link('Add a Client', array('action'=>'add')); ?>

<?php else: ?>
<?php foreach ($results as $result): ?>
    <?php echo $this->Html->link($result['Client']['first_name'].' '
            .$result['Client']['last_name'].' (SEX: '.$result['Client']['sex'].', DOB: '
            .$result['Client']['DOB'].') ',
        array('action'=>'view', $result['Client']['id'])); ?>
<br /><br />
<?php endforeach; ?>
<?php endif; ?>
<br /><br /><br />

<?php echo $this->Html->link('Client Listing', array('action'=>'browse')); ?>
<br /><br />
<?php echo $this->Html->link('Search Again', array('action'=>'index'));?>
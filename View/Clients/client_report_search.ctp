<h2>Search Results</h2>
<br />
<?php
    if ($results == null):
        echo 'No results Found';  
?>
<br /><br />

<?php else: ?>
<?php foreach ($results as $result): ?>
    <?php echo $this->Html->link($result['Client']['first_name'].' '
            .$result['Client']['last_name'].' (SEX: '.$result['Client']['sex'].', DOB: '
            .$result['Client']['DOB'].') ',
        array('action'=>'clientReport', $result['Client']['id'])); ?>
<br /><br />
<?php endforeach; ?>
<?php endif; ?>
<br /><br /><br />

<?php echo $this->Html->link('Client Listing', array('action'=>'browse')); ?>
<br /><br />
<?php echo $this->Html->link('Search Again', array('controller' => 'reports', 'action' =>'index')); ?>
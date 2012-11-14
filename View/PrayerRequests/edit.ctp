<div class="actionsNoButton">
    

        <?php echo $this->Html->link(__('Prayer Requests Listing'), array('action' => 'index', $clientID)); ?><br />
        <?php echo $this->Html->link(__('Clients Listing'), array('controller' => 'clients', 'action' => 'browse')); ?><br />
        <?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'index')); ?>

    
</div>

<div class="prayerRequests form">
<?php echo $this->Form->create('PrayerRequest'); ?>
	<fieldset>
		<legend><?php echo __('Edit Prayer Request'); ?></legend>
	<?php
		echo $this->Form->input('request');
		echo $this->Form->input('comments');
	?>
	</fieldset>
   <div>
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

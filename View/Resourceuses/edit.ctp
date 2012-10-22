<div class="resourceuses form">
<?php echo $this->Form->create('Resourceus'); ?>
	<fieldset>
		<legend><?php echo __('Edit Resource Use'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('client_id');
		echo $this->Form->input('resource_id');
		echo $this->Form->input('date', array('type' => 'date', 'empty' => true));
		echo $this->Form->input('comments');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actionsNoButton">
    
		<?php echo $this->Form->postLink(__('Delete this Resource Use'), 
                        array('action' => 'delete', $this->Form->value('Resourceus.id')), 
                        null, __('Are you sure you want to delete %s?', $this->Form->value('Resourceus.id'))); ?><br /><br />
		<?php echo $this->Html->link(__('Resource Use Listing'), array('action' => 'index')); ?><br /><br />
		<?php echo $this->Html->link(__('Clients Listing'), array('controller' => 'clients', 'action' => 'browse')); ?><br /><br />
		<?php echo $this->Html->link(__('Search for Clients'), array('controller' => 'clients', 'action' => 'index')); ?> 
	
</div>

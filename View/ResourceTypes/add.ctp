<div class="actionsNoButton">
	
		<?php echo $this->Html->link(__('Resource Type Listing'), array('action' => 'index')); ?>
	
</div>

<div class="resourceTypes form">
<?php echo $this->Form->create('ResourceType'); ?>
	<fieldset>
		<legend><?php echo __('Add Resource Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>


<div class="actionsNoButton">

		<?php echo $this->Form->postLink(__('Delete this Resource Type'), array('action' => 'delete', $this->Form->value('ResourceType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ResourceType.id'))); ?><br />
		<?php echo $this->Html->link(__('Resource Type Listing'), array('action' => 'index')); ?>
	
</div>

<div class="resourceTypes form">
<?php echo $this->Form->create('ResourceType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Resource Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>


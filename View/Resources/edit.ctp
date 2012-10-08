<div class="resources form">
<?php echo $this->Form->create('Resource'); ?>
	<fieldset>
		<legend><?php echo __('Edit Resource'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('resource_name');
		echo $this->Form->input('organization_id');
		echo $this->Form->input('resource_status');
		echo $this->Form->input('isDeleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Resource.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Resource.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Resources'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resource Uses'), array('controller' => 'resource_uses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource Us'), array('controller' => 'resource_uses', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="clientChecklistTasks form">
<?php echo $this->Form->create('ClientChecklistTask'); ?>
	<fieldset>
		<legend><?php echo __('Edit Client Checklist Task'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('client_checklist_id');
		echo $this->Form->input('task_name');
		echo $this->Form->input('task_description');
		echo $this->Form->input('comments');
		echo $this->Form->input('isCompleted');
		echo $this->Form->input('isDeleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ClientChecklistTask.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ClientChecklistTask.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Client Checklist Tasks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Client Checklists'), array('controller' => 'client_checklists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Checklist'), array('controller' => 'client_checklists', 'action' => 'add')); ?> </li>
	</ul>
</div>

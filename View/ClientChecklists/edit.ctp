<div class="clientChecklists form">
<?php echo $this->Form->create('ClientChecklist'); ?>
	<fieldset>
		<legend><?php echo __('Edit Client Checklist'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('client_id');
		echo $this->Form->input('isCompleted');
		echo $this->Form->input('isDeleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ClientChecklist.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ClientChecklist.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Client Checklists'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Checklist Tasks'), array('controller' => 'client_checklist_tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Checklist Task'), array('controller' => 'client_checklist_tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>

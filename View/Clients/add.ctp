<div class="clients form">
<?php echo $this->Form->create('Client'); ?>
	<fieldset>
		<legend><?php echo __('Add Client'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('DOB');
		echo $this->Form->input('sex');
		echo $this->Form->input('SSN');
		echo $this->Form->input('address_one');
		echo $this->Form->input('address_two');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('zip');
		echo $this->Form->input('phone');
		echo $this->Form->input('apartment_number');
		echo $this->Form->input('how_did_you_hear');
		echo $this->Form->input('how_long_do_you_need');
		echo $this->Form->input('isDeleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Client Incomes'), array('controller' => 'client_incomes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Income'), array('controller' => 'client_incomes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Relations'), array('controller' => 'client_relations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Relation'), array('controller' => 'client_relations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Specifics'), array('controller' => 'client_specifics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Specific'), array('controller' => 'client_specifics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resource Uses'), array('controller' => 'resource_uses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource Us'), array('controller' => 'resource_uses', 'action' => 'add')); ?> </li>
	</ul>
</div>

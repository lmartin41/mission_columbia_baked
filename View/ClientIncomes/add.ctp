<div class="clientIncomes form">
<?php echo $this->Form->create('ClientIncome'); ?>
	<fieldset>
		<legend><?php echo __('Add Client Income'); ?></legend>
	<?php
		echo $this->Form->input('client_id');
		echo $this->Form->input('regular_job');
		echo $this->Form->input('food_stamps');
		echo $this->Form->input('veterans_pension');
		echo $this->Form->input('part_time_job');
		echo $this->Form->input('social_security');
		echo $this->Form->input('annuity_check');
		echo $this->Form->input('child_support');
		echo $this->Form->input('ssi_or_disability');
		echo $this->Form->input('unemployment');
		echo $this->Form->input('when_next_check');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Client Incomes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>

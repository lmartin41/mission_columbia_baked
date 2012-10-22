<div class="organizations form">
<?php echo $this->Form->create('Organization'); ?>
	<fieldset>
		<legend><?php echo __('Edit Organization'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('org_name');
		echo $this->Form->input('org_type');
		echo $this->Form->input('address_one');
		echo $this->Form->input('address_two');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('zip');
		echo $this->Form->input('contact');
		echo $this->Form->input('website');
		echo $this->Form->input('phone');
		echo $this->Form->input('phone_cell');
		echo $this->Form->input('phone_office');
		echo $this->Form->input('isDeleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actionsNoButton">
		<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Organization.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Organization.id'))); ?><br /><br />
		<?php echo $this->Html->link(__('List Organizations'), array('action' => 'index')); ?><br /><br />
		<?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?><br /><br />
		<?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?><br /><br />
		<?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?><br /><br />
		<?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?>
	
</div>

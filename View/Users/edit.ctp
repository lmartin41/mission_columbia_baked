<div class="actionsNoButton">
	<?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?>
	<?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?>
	<?php echo $this->Html->link(__('View User'), array('action' => 'view', $this->Form->value('User.id'))); ?>
	<?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $this->Form->value('User.id')), array('class' => 'active_link')); ?>
	<?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?>
</div>
<div class="users form">
<?php echo $this->Html->script('edit_user'); ?>
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username', array('disabled'));
		echo $this->Form->input('password');
		echo $this->Form->input('password_confirmation', array('type'=>'password'));
		foreach($optionalInputs as $input)
		{
			echo $this->Form->input($input);
		}
		echo $this->Form->input('organization_id', array($org_disabled));
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

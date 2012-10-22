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
<div class="actionsNoButton">

		<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?><br /><br />
		<?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?><br /><br />
		<?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?><br /><br />
		<?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?><Br /><br />
		<?php echo $this->Html->link(__('List Feedbacks'), array('controller' => 'feedbacks', 'action' => 'index')); ?><br /><br />
		<?php echo $this->Html->link(__('New Feedback'), array('controller' => 'feedbacks', 'action' => 'add')); ?>
	
</div>

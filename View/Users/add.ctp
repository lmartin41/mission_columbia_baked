<div class="actionsNoButton">
	<?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?><br />
	<?php echo $this->Html->link(__('New User'), array('action' => 'add'), array('class' => 'active_link')); ?>	
</div>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
        echo $this->Form->input('password_confirmation', array('type'=>'password'));
        foreach($optionalInputs as $input)
        {
        	echo $this->Form->input($input);
        }
		echo $this->Form->input('organization_id', array($org_disabled, 'selected' => $selected_id));
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

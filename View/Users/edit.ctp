<div class="actionsNoButton">
	<?php if( $isAtleastAdmin ): ?>
		<?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?><br />
		<?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?><br />
		<?php echo $this->Html->link(__('View User'), array('action' => 'view', $this->Form->value('User.id'))); ?><br />
		<?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $this->Form->value('User.id')), array('class' => 'active_link')); ?><br />
		<?php echo $this->Html->link(__('Change Password'), array('action' => 'editPassword', $this->Form->value('User.id'))); ?><br />
		<?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?>
	<?php else: ?>
		<?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $this->Form->value('User.id')), array('class' => 'active_link')); ?><br />
		<?php echo $this->Html->link(__('Change Password'), array('action' => 'editPassword', $this->Form->value('User.id'))); ?><br />
	<?php endif; ?>
</div>
<div class="users form">
<?php echo $this->Html->script('edit_user'); ?>
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username', array('type' => 'hidden'));
		echo $this->Form->input('u', array('type' => 'text', 'label' => 'Username:', 'value' => $this->Form->value('User.username'), 'disabled' => 'disabled'));
		foreach($optionalInputs as $input)
		{
			echo $this->Form->input($input);
		}
		echo $this->Form->input('organization_id', array('label' => 'Organization:', 'disabled' => $org_disabled, 'style' => 'margin-left: 10px;'));
		echo $this->Form->input('email', array('label' => 'Email:'));
	?>
	</fieldset>
    <div>
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<div class="feedbacks form">
<?php echo $this->Form->create('Feedback'); ?>
	<fieldset>
		<legend><?php echo __('Add Feedback'); ?></legend>
	<?php
		echo $this->Form->input('user_id', array('disabled', 'selected' => $selected_id));
		echo $this->Form->input('feedback');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actionsNoButton">
	
		<?php if( $isAtleastAdmin ): ?>
			<?php echo $this->Html->link(__('List Feedbacks'), array('action' => 'index')); ?><br /><br />
			<?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?><br /><br />
			<?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?>
		<?php endif; ?>
	
</div>

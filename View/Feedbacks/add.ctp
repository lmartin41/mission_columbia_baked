<div class="actionsNoButton">
	<?php if( $isAtleastAdmin ): ?>
		<?php echo $this->Html->link(__('List Feedbacks'), array('action' => 'index')); ?><br />
		<?php echo $this->Html->link(__('New Feedback'), array('action' => 'add'), array('class' => 'active_link')); ?>
	<?php endif; ?>
</div>

<?php if( $isAtleastAdmin ): ?>
<div class="feedbacks form">
<?php else: ?>
<div class="feedbacks form no-border">
<?php endif; ?>
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
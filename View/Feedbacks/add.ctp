<div class="actionsNoButton">
	<?php if( $current_user['isSuperAdmin'] ): ?>
		<?php echo $this->Html->link(__('List Feedbacks'), array('action' => 'index')); ?><br />
		<?php echo $this->Html->link(__('New Feedback'), array('action' => 'add'), array('class' => 'active_link')); ?>
	<?php endif; ?>
</div>

<?php if( $current_user['isSuperAdmin'] ): ?>
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
    <div>
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
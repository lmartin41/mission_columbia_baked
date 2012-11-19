<div class="actionsNoButton tips">
	<?php echo $this->Html->link(__('List Tips'), array('action' => 'index')); ?><br/>
	<?php echo $this->Html->link(__('New Tip'), array('action' => 'add')); ?><br/>
	<?php echo $this->Html->link(__('Edit Tip'), array('action' => 'edit', $this->Form->value('Tip.id')), array('class' => 'active_link')); ?> <br/>
	<?php echo $this->Form->postLink(__('Delete Tip'), array('action' => 'delete', $this->Form->value('Tip.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tip.id'))); ?><br/>
</div>
<div class="tips form">
<?php echo $this->Form->create('Tip'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tip'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tip');
		echo $this->Form->input('isDeleted', array('label' => 'Is Deleted?'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

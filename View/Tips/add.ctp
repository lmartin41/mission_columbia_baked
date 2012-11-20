<?php $this->Html->script('tiny_mce/tiny_mce', FALSE); ?>
<?php $this->Html->script('tips_add', FALSE); ?>
<div class="actionsNoButton tips">
	<?php echo $this->Html->link(__('List Tips'), array('action' => 'index')); ?><br/>
	<?php echo $this->Html->link(__('New Tip'), array('action' => 'add'), array('class' => 'active_link')); ?>
</div>
<div class="tips form">
<?php echo $this->Form->create('Tip'); ?>
	<fieldset>
		<legend><?php echo __('Add Tip'); ?></legend>
	<?php
		echo $this->Form->input('organization_id', $options['organization_id']);
		echo $this->Form->input('controller', $options['controller']);
		echo $this->Form->input('view', $options['view']);
		echo $this->Form->input('tip', array('label' => 'Tip:'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div id="dialog-duplicate" title="Duplicate Tips!" class="do_not_show">
    <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>This tip already exists.  What would you like to do?</p>
</div>
<div id="dialog-disabled" title="Submit Button Disabled" class="do_not_show">
	<p><span class="ui-icon ui-icon-locked" style="float: left; margin: 0 7px 30px 0;"></span>The submit button has been disabled until you select a different view.</p>
</div>

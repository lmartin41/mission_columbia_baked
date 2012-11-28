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

        $options = array(
		    'standard' => 'Standard',
		    'pro' => 'Pro'
		);

		$attributes = array(
		    'legend' => false,
		    'value' => $foo
		);

		echo $this->Form->radio('type', $options, $attributes);

		echo $this->Form->input('organization_id', array($org_disabled, 'selected' => $selected_id));
		echo $this->Form->input('email');
	?>
	</fieldset>
    <div>
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<style type="text/css">
    form label { 
        width: 10em; 
        float: left;
        padding: 0px;
    }
</style>

<div class="actionsNoButton">

		<?php echo $this->Html->link(__('Fields Listing'), array('action' => 'index')); ?><br />
	
</div>

<div class="fields form">
<?php echo $this->Form->create('Field'); ?>
	<fieldset>
		<legend><?php echo __('Add Field'); ?></legend>
	<?php
		echo $this->Form->input('table_ref', array('type' => 'select', 'label' => 'Table reference', 'options' => array('clients' => 'clients', 'resources' => 'resources')));
                echo $this->Form->input('field_name');
		echo $this->Form->input('field_type', array('type' => 'select', 'options' => array('text' => 'text', 'textarea' => 'textarea', 'checkbox' => 'checkbox')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>


<div class="clientChecklists form">
<?php echo $this->Form->create('ClientChecklist'); ?>
	<fieldset>
		<legend><?php echo __('Add Client Checklist'); ?></legend>
	<?php
		echo $this->Form->input('checklist_name');
		echo $this->Form->input('checklist_description');
	?>
	</fieldset>
    <div>
        <?php echo $this->Form->submit('Save and Add a Checklist Task', array('name' => 'addMore', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
<?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="actionsNoButton">
	<ul>

		<li><?php echo $this->Html->link(__('Checklists Listing'), array('action' => 'index', $clientID)); ?></li><br />
		<li><?php echo $this->Html->link(__('Clients Listing'), array('controller' => 'clients', 'action' => 'browse')); ?> </li><br />
		<li><?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		
	</ul>
</div>

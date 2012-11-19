<?php $this->Html->script('resource_uses_add', FALSE); ?>
<div class="actionsNoButton resourceuses">
    
		<?php echo $this->Form->postLink(__('Delete this Resource Use'), 
                        array('action' => 'delete', $this->Form->value('Resourceus.id')), 
                        null, __('Are you sure you want to delete %s?', $this->Form->value('Resourceus.id'))); ?><br /><br />
		<?php echo $this->Html->link(__('Resource Use Listing'), array('action' => 'index')); ?><br /><br />
		<?php echo $this->Html->link(__('Search for Clients'), array('controller' => 'clients', 'action' => 'index')); ?> 
	
</div>
<div class="resourceuses form">
    <?php echo $this->Form->create('ResourceUs'); ?>
    <fieldset>
        <legend><?php echo __('Edit Resource Use'); ?></legend>
        <?php
        echo $this->Form->input('organization_id', array('label' => 'Organization:', 'id' => 'organization', 'selected' => $selected_organization));
        echo $this->Form->input('resource_id', array('type' => 'select', 'label' => 'Resource:', 'selected' => $selected_resource));
        echo $this->Form->input('date', array('type' => 'date', 'minYear' => date('Y') - 120, 'maxYear' => date('Y'), 'empty' => true));
        echo $this->Form->input('comments');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

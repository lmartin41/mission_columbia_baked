<div class="resourceuses form">
    <?php echo $this->Form->create('ResourceUs'); ?>
    <fieldset>
        <legend><?php echo __('Add Resource Use'); ?></legend>
        <?php
        echo $this->Form->input('resource_id');
        echo $this->Form->input('date', array('type' => 'date', 'minYear'=>date('Y')-50, 'maxYear'=>date('Y')));
        echo $this->Form->input('comments');
        ?>
    </fieldset>
    <div>
        <?php echo $this->Form->submit('Add another Resource Use For this Client', array('name' => 'Add_another_resource', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="actionsNoButton">
        <?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'index')); ?><br /><br />
        <?php echo $this->Html->link(__('Client Listing'), array('controller' => 'clients', 'action' => 'browse')); ?><br /><br />
        <?php echo $this->Html->link(__('Resource Listing'), array('controller' => 'resources', 'action' => 'index')); ?> 
</div>

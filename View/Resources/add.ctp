<div class="resources form">
    <?php echo $this->Form->create('Resource'); ?>
    <fieldset>
        <legend><?php echo __('Add Resource'); ?></legend>
        <?php
        echo $this->Form->input('resource_name');
        echo $this->Form->input('description');
        echo $this->Form->input('inventory');
        echo $this->Form->input('resource_status');
        ?>
    </fieldset>
    <div>
        <?php echo $this->Form->submit('Add Another Resource', array('name' => 'Add_another_relative', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="actionsNoButton">

        <?php echo $this->Html->link(__('Resource Listing'), array('action' => 'index')); ?><br />
        <?php echo $this->Html->link(__('Organization Listing'), array('controller' => 'organizations', 'action' => 'index')); ?>
</div>

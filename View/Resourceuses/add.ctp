<div class="resourceuses form">
    <?php echo $this->Form->create('Resourceus'); ?>
    <fieldset>
        <legend><?php echo __('Add Resource Use'); ?></legend>
        <?php
        echo $this->Form->input('resource_id');
        echo $this->Form->input('date', array('type' => 'date'));
        echo $this->Form->input('comments');
        ?>
    </fieldset>
    <div>
        <?php echo $this->Form->submit('Add another Resource Use For this Client', array('name' => 'Add_another_resource', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Finished!', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Resourceuses'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
    </ul>
</div>

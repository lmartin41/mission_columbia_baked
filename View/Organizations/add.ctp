<div class="organizations form">
    <?php echo $this->Form->create('Organization'); ?>
    <fieldset>
        <legend><?php echo __('Add Organization'); ?></legend>
        <?php
        echo $this->Form->input('org_name');
        echo $this->Form->input('org_type');
        echo $this->Form->input('address_one');
        echo $this->Form->input('address_two');
        echo $this->Form->input('city');
        echo $this->Form->input('state');
        echo $this->Form->input('zip');
        echo $this->Form->input('contact');
        echo $this->Form->input('website');
        echo $this->Form->input('phone');
        echo $this->Form->input('phone_cell');
        echo $this->Form->input('phone_office');
        ?>
    </fieldset>
    <div>
        <?php echo $this->Form->submit(__('Save and Add a Resource for this Organization'), array('name' => 'addMore', 'div' => false)); ?>
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

        <li><?php echo $this->Html->link(__('Organization Listing'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Resource Listing'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Create a Resource for this Organization'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users for this Organization'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Create a new User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>

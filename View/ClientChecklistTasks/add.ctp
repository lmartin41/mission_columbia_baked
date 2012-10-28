<div class="clientChecklistTasks form">
    <?php echo $this->Form->create('ClientChecklistTask'); ?>
    <fieldset>
        <legend><?php echo __('Add Client Checklist Task'); ?></legend>
        <?php
        echo $this->Form->input('task_name');
        echo $this->Form->input('task_description');
        echo $this->Form->input('comments');
        ?>
    </fieldset>
    <div>
        <?php echo $this->Form->submit('Add another Task', array('name' => 'Add_Another_Task', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="actionsNoButton">
    <ul>
        <li><?php echo $this->Html->link(__('Browse Client Checklists'), array('controller' => 'client_checklists', 'action' => 'index', $clientChecklistID)); ?> </li><br />
        <li><?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'client', 'action' => 'index')); ?> </li><br />
        <li><?php echo $this->Html->link(__('Browse Clients'), array('controller' => 'clients', 'action' => 'browse')); ?> </li>
    </ul>
</div>

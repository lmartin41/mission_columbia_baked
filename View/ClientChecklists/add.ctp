<div class="clientChecklists form">
    <?php echo $this->Form->create('ClientChecklist'); ?>
    <fieldset>
        <legend><?php echo __('Add Client Checklist'); ?></legend>
        <?php
        echo $this->Form->input('client_id');
        ?>
    </fieldset>
    <div>
        <?php echo $this->Form->submit(__('Save and Add a Checklist Task'), array('name' => 'addMore', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="actionsNoButton">
    <ul>

        <li><?php echo $this->Html->link(__('List Client Checklists'), array('action' => 'index')); ?></li><Br />
        <li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li><br />
        <li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li><br />
        <li><?php echo $this->Html->link(__('List Client Checklist Tasks'), array('controller' => 'client_checklist_tasks', 'action' => 'index')); ?> </li><br />
        <li><?php echo $this->Html->link(__('New Client Checklist Task'), array('controller' => 'client_checklist_tasks', 'action' => 'add')); ?> </li>
    </ul>
</div>

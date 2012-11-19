<div class="clientChecklistTasks form">
    <?php echo $this->Form->create('ClientChecklistTask'); ?>
    <fieldset>
        <legend><?php echo __('Edit Client Checklist Task'); ?></legend>
        <?php
        echo $this->Form->input('task_name');
        echo $this->Form->input('task_description');
        echo $this->Form->input('comments');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actionsNoButton">


    <?php echo $this->Form->postLink(__('Delete this Task'), array('action' => 'delete', $this->Form->value('ClientChecklistTask.id'), $clientID), null, __('Are you sure you want to delete this task?')); ?><Br />
    <?php echo $this->Html->link(__('Checklists Listing'), array('controller' => 'client_checklists', 'action' => 'index', $clientID)); ?><br />
    <?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'index')); ?><br />

</div>

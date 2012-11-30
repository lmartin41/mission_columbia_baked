<div class="actionsNoButton">

    <?php echo $this->Html->link(__('Edit Task'), array('action' => 'edit', $clientChecklistTask['ClientChecklistTask']['id'], $clientID)); ?><Br />
    <?php echo $this->Form->postLink(__('Delete Task'), array('action' => 'delete', $clientChecklistTask['ClientChecklistTask']['id'], $clientID), null, __('Are you sure you want to delete this task?')); ?><br />
    <?php echo $this->Html->link(__('Checklists Listing'), array('controller' => 'ClientChecklists', 'action' => 'index', $clientID)); ?> <br />
    <?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'index')); ?>

</div>

<div class="clientChecklistTasks view">
    <h2><?php echo __('Client Checklist Task'); ?></h2>
    <dl>
        <dt><?php echo __('Task Name'); ?></dt>
        <dd>
            <?php echo h($clientChecklistTask['ClientChecklistTask']['task_name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Task Description'); ?></dt>
        <dd>
            <?php echo h($clientChecklistTask['ClientChecklistTask']['task_description']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Comments'); ?></dt>
        <dd>
            <?php echo h($clientChecklistTask['ClientChecklistTask']['comments']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('IsCompleted'); ?></dt>
        <dd>
            <?php echo ($clientChecklistTask['ClientChecklistTask']['isCompleted'] == 1) ? 'Yes' : 'No'; ?>
            &nbsp;
        </dd>
    </dl>
</div>


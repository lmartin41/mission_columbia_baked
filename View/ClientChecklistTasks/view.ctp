<div class="actionsNoButton">

    <?php echo $this->Html->link(__('Edit Task'), array('action' => 'edit', $clientChecklistTask['ClientChecklistTask']['id'], $clientID)); ?><Br />
    <?php echo $this->Form->postLink(__('Delete Task'), array('action' => 'delete', $clientChecklistTask['ClientChecklistTask']['id'], $clientID), null, __('Are you sure you want to delete # %s?', $clientChecklistTask['ClientChecklistTask']['id'])); ?><br />
    <?php echo $this->Html->link(__('Checklists Listing'), array('controller' => 'ClientChecklists', 'action' => 'index', $clientID)); ?> <br />
    <?php echo $this->Html->link(__('Clients Listing'), array('controller' => 'clients', 'action' => 'browse')); ?><br />
    <?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'index')); ?>

</div>

<div class="clientChecklistTasks view">
    <h2><?php echo __('Client Checklist Task'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($clientChecklistTask['ClientChecklistTask']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Client Checklist'); ?></dt>
        <dd>
            <?php echo $this->Html->link($clientChecklistTask['ClientChecklist']['id'], array('controller' => 'client_checklists', 'action' => 'view', $clientChecklistTask['ClientChecklist']['id'])); ?>
            &nbsp;
        </dd>
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
            <?php echo h($clientChecklistTask['ClientChecklistTask']['isCompleted']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('IsDeleted'); ?></dt>
        <dd>
            <?php echo h($clientChecklistTask['ClientChecklistTask']['isDeleted']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($clientChecklistTask['ClientChecklistTask']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($clientChecklistTask['ClientChecklistTask']['modified']); ?>
            &nbsp;
        </dd>
    </dl>
</div>


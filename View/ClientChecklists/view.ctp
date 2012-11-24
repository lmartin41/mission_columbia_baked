<div class="actionsNoButton">
    
        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $clientChecklist['ClientChecklist']['id'], $clientChecklist['Client']['id'])); ?> <br />
        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $clientChecklist['ClientChecklist']['id'], $clientChecklist['Client']['id']), null, __('Are you sure you want to delete this checklist?')); ?><br />
        <?php echo $this->Html->link(__('Checklists Listing'), array('action' => 'index', $clientChecklist['Client']['id'])); ?> <br />
        <?php echo $this->Html->link(__('New Checklist'), array('action' => 'add', $clientChecklist['ClientChecklist']['id'])); ?><br />
        <?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'index')); ?><br />
        <?php echo $this->Html->link(__('New Client Checklist Task'), array('controller' => 'client_checklist_tasks', 'action' => 'add')); ?>
    
</div>
<div class="clientChecklists view">
    <h2><?php echo __('Client Checklist'); ?></h2>
    <dl>
        <dt><?php echo __('Client'); ?></dt>
        <dd>
            <?php echo $this->Html->link($clientChecklist['Client']['first_name'] . ' ' . $clientChecklist['Client']['last_name'], array('controller' => 'clients', 'action' => 'view', $clientChecklist['Client']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Checklist Name'); ?></dt>
        <dd>
            <?php echo $clientChecklist['ClientChecklist']['checklist_name']; ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Checklist Description'); ?></dt>
        <dd>
            <?php echo $clientChecklist['ClientChecklist']['checklist_description']; ?>
            &nbsp;
        </dd>
        <dt><?php echo __('IsCompleted'); ?></dt>
        <dd>
            <?php echo h($clientChecklist['ClientChecklist']['isCompleted']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($clientChecklist['ClientChecklist']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($clientChecklist['ClientChecklist']['modified']); ?>
            &nbsp;
        </dd>
    </dl>
<Br /><br />
    <h3><?php echo __('Client Checklist Tasks'); ?></h3>
    <?php if (!empty($clientChecklist['ClientChecklistTask'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Client Checklist Id'); ?></th>
                <th><?php echo __('Task Name'); ?></th>
                <th><?php echo __('Task Description'); ?></th>
                <th><?php echo __('Comments'); ?></th>
                <th><?php echo __('IsCompleted'); ?></th>
                <th class="actions"><?php echo __(''); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($clientChecklist['ClientChecklistTask'] as $clientChecklistTask):
                ?>
                <tr>
                    <td><?php echo $clientChecklistTask['id']; ?></td>
                    <td><?php echo $clientChecklistTask['client_checklist_id']; ?></td>
                    <td><?php echo $clientChecklistTask['task_name']; ?></td>
                    <td><?php echo $clientChecklistTask['task_description']; ?></td>
                    <td><?php echo $clientChecklistTask['comments']; ?></td>
                    <td><?php echo $clientChecklistTask['isCompleted']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View/Edit'), array('controller' => 'client_checklist_tasks', 'action' => 'view', $clientChecklistTask['id'], $clientChecklist['Client']['id'])); ?>
                    </td>
                </tr>
        <?php endforeach; ?>
        </table>
<?php endif; ?>

    <div>
        None
    </div>
</div>

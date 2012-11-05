<div class="clientChecklists index">
    <h2><?php echo __('Client Checklists for ' . $client['Client']['first_name']); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('client'); ?></th>
            <th><?php echo $this->Paginator->sort('isCompleted'); ?></th>
            <th><?php echo $this->Paginator->sort('checklist_name'); ?></th>
            <th><?php echo $this->Paginator->sort('checklist_description'); ?></th>
            <th class="actions"><?php echo __(''); ?></th>
        </tr>
        <?php
        foreach ($clientChecklists as $clientChecklist):
            if ($client['Client']['id'] == $clientChecklist['Client']['id']):
                ?>
                <tr>
                    <td><?php echo h($clientChecklist['ClientChecklist']['id']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($clientChecklist['Client']['first_name']." ".$clientChecklist['Client']['last_name'], array('controller' => 'clients', 'action' => 'view', $clientChecklist['Client']['id'])); ?>
                    </td>
                    <td><?php echo h($clientChecklist['ClientChecklist']['isCompleted']); ?>&nbsp;</td>
                    <td><?php echo h($clientChecklist['ClientChecklist']['checklist_name']); ?>&nbsp;</td>
                    <td><?php echo h($clientChecklist['ClientChecklist']['checklist_description']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('Add Task'), array('controller' => 'ClientChecklistTasks', 'action' => 'add', $clientChecklist['ClientChecklist']['id'])); ?>
                        <?php echo $this->Html->link(__('View/Edit'), array('action' => 'view', $clientChecklist['ClientChecklist']['id'])); ?>

                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>

    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<div class="actionsNoButton">
    <ul>
        <?php echo $this->Html->link(__('Create Client Checklist'), array('action' => 'add', $client['Client']['id'])); ?><br />
        <?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'index')); ?> <br />
        <?php echo $this->Html->link(__('Browse Clients'), array('controller' => 'clients', 'action' => 'browse')); ?><br />
    </ul>
</div>

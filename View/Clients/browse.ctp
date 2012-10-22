<div class ="clients form">   
    <h2><?php echo __('Client Listing'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('first_name'); ?></th>
            <th><?php echo $this->Paginator->sort('last_name'); ?></th>
            <th><?php echo $this->Paginator->sort('id'); ?></th>

            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($clients as $client): ?>
            <tr>
                <td><?php echo h($client['Client']['first_name']); ?>&nbsp;</td>
                <td><?php echo h($client['Client']['last_name']); ?>&nbsp;</td>
                <td><?php echo h($client['Client']['id']); ?>&nbsp;</td>

                <td class="actions">
                    <?php echo $this->Html->link(__('View details'), array('action' => 'view', $client['Client']['id'])); ?>
                    <?php echo $this->Html->link(__('Add Resource Use'), array('controller' => 'resource_uses', 'action' => 'add', $client['Client']['id'])); ?>
                    <?php echo $this->Html->link(__('Client Checklist'), array('controller' => 'client_checklists', 'action' => 'index', $client['Client']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $client['Client']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $client['Client']['id']), null, __('Are you sure you want to delete %s?', $client['Client']['first_name'])); ?>
                </td>
            </tr>
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
    <br />

</div>
<div class="actionsNoButton">
    <?php echo $this->Html->link(__('Add a Client'), array('action' => 'add')); ?><br /><br />
    <?php echo $this->Html->link(__('Browse Clients'), array('action' => 'browse')); ?>
        
</div>
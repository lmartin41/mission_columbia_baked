
<h2><?php echo __('Which Relative?'); ?></h2>
<table cellpadding="0" cellspacing="0">
    <tr>
        <th><?php echo $this->Paginator->sort('id'); ?></th>
        <th><?php echo $this->Paginator->sort('client_id'); ?></th>
        <th><?php echo $this->Paginator->sort('first_name'); ?></th>
        <th><?php echo $this->Paginator->sort('last_name'); ?></th>
        <th><?php echo $this->Paginator->sort('relationship'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($clientRelations as $clientRelation): ?>
        <?php if ($clientRelation['ClientRelation']['client_id'] == $clientID): ?>
            <tr>
                <td><?php echo h($clientRelation['ClientRelation']['id']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link($clientRelation['Client']['first_name'], array('controller' => 'clients', 'action' => 'view', $clientRelation['Client']['id'])); ?>
                </td>
                <td><?php echo h($clientRelation['ClientRelation']['first_name']); ?>&nbsp;</td>
                <td><?php echo h($clientRelation['ClientRelation']['last_name']); ?>&nbsp;</td>
                <td><?php echo h($clientRelation['ClientRelation']['relationship']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $clientRelation['ClientRelation']['id'], $clientRelation['ClientRelation']['client_id'])); ?>
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $clientRelation['ClientRelation']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $clientRelation['ClientRelation']['id']),  null, __('Are you sure you want to delete # %s?', $clientRelation['ClientRelation']['id'])); ?>
                </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
</table>


<div class="paging">
    <?php
    echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
    echo $this->Paginator->numbers(array('separator' => ''));
    echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
</div>
<br /><br />
<?php echo $this->Html->link(__('Add a new Relative'), array('action' => 'add', $clientID)); ?>
<br /><br />
<?php echo $this->Html->link(__('Go back to Client Listing'), array('controller' => 'clients', 'action' => 'index')); ?>
</ul>
</div>

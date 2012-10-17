
<h2><?php echo __('Organization Listing'); ?></h2>
<table cellpadding="0" cellspacing="0">
    <tr>
        <th><?php echo $this->Paginator->sort('org_name'); ?></th>
        <th><?php echo $this->Paginator->sort('org_type'); ?>
        <th><?php echo $this->Paginator->sort('contact'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($organizations as $organization): ?>
        <tr>
            <td><?php echo h($organization['Organization']['org_name']); ?>&nbsp;</td>
            <td><?php echo h($organization['Organization']['org_type']); ?>&nbsp;</td>
            <td><?php echo h($organization['Organization']['contact']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link('Create a Resource for this Organization', array('controller' => 'resources', 'action' => 'add', $organization['Organization']['id'])); ?>
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $organization['Organization']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organization['Organization']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $organization['Organization']['id']), null, __('Are you sure you want to delete # %s?', $organization['Organization']['id'])); ?>
                
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
<br /><br />
<?php echo $this->Html->link(__('Create a New Organization'), array('action' => 'add')); ?>



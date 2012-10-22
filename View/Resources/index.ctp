<h2><?php echo __('Resource Listing'); ?></h2>
<table cellpadding="0" cellspacing="0">
    <tr>
        <th><?php echo $this->Paginator->sort('id'); ?></th>
        <th><?php echo $this->Paginator->sort('resource_name'); ?></th>
        <th><?php echo $this->Paginator->sort('organization_id'); ?></th>
        <th><?php echo $this->Paginator->sort('description'); ?></th>
        <th><?php echo $this->Paginator->sort('inventory'); ?></th>
        <th class="actions"><?php echo __(''); ?></th>
    </tr>
    <?php foreach ($resources as $resource): ?>
        <tr>
            <td><?php echo h($resource['Resource']['id']); ?>&nbsp;</td>
            <td><?php echo h($resource['Resource']['resource_name']); ?>&nbsp;</td>
            <td>
                <?php echo $this->Html->link($resource['Organization']['org_name'], array('controller' => 'organizations', 'action' => 'view', $resource['Organization']['id'])); ?>
            </td>
            <td><?php echo h($resource['Resource']['description']); ?>&nbsp;</td>
            <td>
                <?php echo h($resource['Resource']['inventory']); ?>&nbsp;
            </td>
            <td class="actions">
                <?php echo $this->Html->link(__('View/Edit'), array('action' => 'view', $resource['Resource']['id'])); ?>
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
<?php if ($isAtleastAdmin): ?>
    <?php echo $this->Html->link('Create a Resource for Your Organization', array('action' => 'add', $current_user['organization_id'])); ?>
<?php endif; ?>




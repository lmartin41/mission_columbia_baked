<?php if ($isAtleastAdmin): ?>
    <div class="organizations form">
    <?php endif; ?>

    <h2><?php echo __('Organization Listing'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('org_name'); ?></th>
            <th><?php echo $this->Paginator->sort('org_type'); ?>
            <th><?php echo $this->Paginator->sort('contact'); ?></th>
            <th class="actions"><?php echo __(''); ?></th>
        </tr>
        <?php foreach ($organizations as $organization): ?>
            <tr>
                <td><?php echo h($organization['Organization']['id']); ?>&nbsp;</td>
                <td><?php echo h($organization['Organization']['org_name']); ?>&nbsp;</td>
                <td><?php echo h($organization['Organization']['org_type']); ?>&nbsp;</td>
                <td><?php echo h($organization['Organization']['contact']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View/Edit'), array('action' => 'view', $organization['Organization']['id'])); ?>
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
    <?php if ($isAtleastAdmin): ?>
    </div>

    <div class="actionsNoButton" style="">
        <?php echo $this->Html->link(__('New Organization'), array('action' => 'add')); ?><br /><br />
        <?php echo $this->Html->link('Create a Resource', array('controller' => 'resources', 'action' => 'add', $organization['Organization']['id'])); ?>
    </div>
<?php endif; ?>



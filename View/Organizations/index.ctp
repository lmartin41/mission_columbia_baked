<?php if ($isAtleastAdmin): ?>
<div class="organizations form">
<?php else: ?>
<div class="organizations form no-border">
<?php endif; ?>

    <h2><?php echo __('Organization Listing'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('org_name'); ?></th>
            <th><?php echo $this->Paginator->sort('contact'); ?></th>
            <th class="actions"><?php echo __(''); ?></th>
        </tr>
        <?php foreach ($organizations as $organization): ?>
            <tr>
                <td><?php echo h($organization['Organization']['org_name']); ?>&nbsp;</td>
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
    
</div>
<?php if ($isAtleastAdmin): ?>
    <div class="actionsNoButton" style="">
        <?php echo $this->Html->link(__('New Organization'), array('action' => 'add')); ?><br />
    </div>
<?php endif; ?>



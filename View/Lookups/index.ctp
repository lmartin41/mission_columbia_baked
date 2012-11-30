<div class="actionsNoButton">
    <?php echo $this->Html->link(__('New Custom Label'), array('action' => 'add')); ?><br />
    <?php echo $this->Html->link(__('Customize'), array('controller' => 'customize', 'action' => 'index')); ?>

</div>

<div class="lookups index">
    <h2><?php echo __('Custom Labels'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('organization_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Table Reference'); ?></th>
            <th><?php echo $this->Paginator->sort('field_name'); ?></th>
            <th><?php echo $this->Paginator->sort('custom_name'); ?></th>
            <th class="actions"><?php echo __(''); ?></th>
        </tr>
        <?php foreach ($lookups as $lookup): ?>
            <tr>
                <td>
                    <?php echo $this->Html->link($lookup['Organization']['org_name'], array('controller' => 'organizations', 'action' => 'view', $lookup['Organization']['id'])); ?>
                </td>
                <td><?php echo h($lookup['Lookup']['table_reference']); ?>&nbsp;</td>
                <td><?php echo h($lookup['Lookup']['field_name']); ?>&nbsp;</td>
                <td><?php echo h($lookup['Lookup']['custom_name']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $lookup['Lookup']['id'])); ?>
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


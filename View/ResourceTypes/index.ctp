<div class="actionsNoButton">
    <?php echo $this->Html->link(__('New Resource Type'), array('action' => 'add')); ?><br />
    <?php echo $this->Html->link(__('Customization'), array('controller' => 'customize', 'action' => 'index')); ?>

</div>

<div class="resourceTypes index">
    <h2><?php echo __('Resource Types'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th class="actions"><?php echo __(''); ?></th>
        </tr>
        <?php foreach ($resourceTypes as $resourceType): ?>
            <tr>
                <td><?php echo h($resourceType['ResourceType']['name']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $resourceType['ResourceType']['id'])); ?>
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


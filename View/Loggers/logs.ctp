<div class="actionsNoButton">
    <?php echo $this->Html->link(__('Individual Reports'), array()); ?><br />
    <ul>
        <li><?php echo $this->Html->link(__('Clients'), array('controller' => 'reports', 'action' => 'index')); ?></li><br />
        <li><?php echo $this->Html->link(__('Resources'), array('controller' => 'reports', 'action' => 'resourceIndex')); ?></li><br />
    </ul>
    <?php echo $this->Html->link(__('Aggregate Reports'), array()); ?><br />
    <ul>
        <li><?php echo $this->Html->link('Counts', array('controller' => 'reports', 'action' => 'countsIndex')); ?></li><br />
        <li><?php echo $this->Html->link('Logs', array('controller' => 'loggers', 'action' => 'index')); ?></li>
    </ul>
    <br />
    <?php if ($isAtleastAdmin) echo $this->Html->link('Prayer Journal', array('controller' => 'reports', 'action' => 'prayerIndex')); ?>

</div>
<div class="loggers index">
    <h3>Logs</h3>
    <br />
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Category'); ?></th>
            <th><?php echo $this->Paginator->sort('action'); ?></th>
            <th><?php echo $this->Paginator->sort('Description'); ?></th>
            <th><?php echo $this->Paginator->sort('Date'); ?></th>
        </tr>
        <?php foreach ($loggers as $logger): ?>
            <?php if (strtotime($logger['Logger']['created']) >= strtotime($startDate) && strtotime($logger['Logger']['created']) <= strtotime($endDate)): ?>
                <tr>
                    <td>
                        <?php echo $this->Html->link($logger['User']['username'], array('controller' => 'users', 'action' => 'view', $logger['User']['id'])); ?>
                    </td>
                    <td><?php echo h($logger['Logger']['controller']); ?>&nbsp;</td>
                    <td><?php echo h($logger['Logger']['action']); ?>&nbsp;</td>
                    <td><?php echo h($logger['Logger']['description']); ?>&nbsp;</td>
                    <td><?php echo h($logger['Logger']['created']); ?>&nbsp;</td>
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
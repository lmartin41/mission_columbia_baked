<div class="prayerRequests index">
    <h2><?php echo __('Prayer Requests for ' . $client['Client']['first_name']); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('client_id'); ?></th>
            <th><?php echo $this->Paginator->sort('date'); ?></th>
            <th><?php echo $this->Paginator->sort('request'); ?></th>
            <th><?php echo $this->Paginator->sort('comments'); ?></th>
            <th class="actions"><?php echo __(''); ?></th>
        </tr>
        <?php
        foreach ($prayerRequests as $prayerRequest):
            if ($client['Client']['id'] == $prayerRequest['PrayerRequest']['client_id']):
                ?>
                <tr>
                    <td><?php echo h($prayerRequest['PrayerRequest']['id']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($prayerRequest['Client']['id'], array('controller' => 'clients', 'action' => 'view', $prayerRequest['Client']['id'])); ?>
                    </td>
                    <td><?php echo h($prayerRequest['PrayerRequest']['date']); ?>&nbsp;</td>
                    <td><?php echo h($prayerRequest['PrayerRequest']['request']); ?>&nbsp;</td>
                    <td><?php echo h($prayerRequest['PrayerRequest']['comments']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View/Edit'), array('action' => 'view', $prayerRequest['PrayerRequest']['id'], $client['Client']['id'])); ?>
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

    <?php echo $this->Html->link(__('New Prayer Request'), array('action' => 'add', $client['Client']['id'])); ?><br />
    <?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'index')); ?> <br />
    <?php echo $this->Html->link(__('Browse Clients'), array('controller' => 'clients', 'action' => 'browse')); ?><br />

</div>
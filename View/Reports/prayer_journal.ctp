<?php include("reportsDiv.ctp"); ?>   

<div class="Reports form">

    <h3><?php echo "Prayer Journal"; ?></h3>
    <table cellpadding = "0" cellspacing = "0">
        <tr>
            <th><?php echo $this->Paginator->sort('Client Name'); ?></th>
            <th><?php echo $this->Paginator->sort('Request'); ?></th>
            <th><?php echo $this->Paginator->sort('Comments'); ?></th>
            <th><?php echo $this->Paginator->sort('Date'); ?></th>
            <th class="actions"><?php echo __(''); ?></th>
        </tr>
        <?php foreach ($prayerRequests as $prayerRequest): ?>
            <tr>
                <td><?php echo $this->Html->link($prayerRequest['Client']['last_name'], array('controller' => 'clients', 'action' => 'view', $prayerRequest['Client']['id'])); ?></td>
                <td><?php echo $prayerRequest['PrayerRequest']['request']; ?></td>
                <td><?php echo $prayerRequest['PrayerRequest']['comments']; ?></td>
                <td><?php echo $prayerRequest['PrayerRequest']['created']; ?></td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View/Edit'), array('controller' => 'prayer_requests', 'action' => 'view', $prayerRequest['PrayerRequest']['id'])); ?>
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
    <?php echo $this->Html->link("Print this Prayer Journal", array('action' => 'printPrayers')); ?>




</div>
<?php include "reportsDiv.ctp"; ?>

<div class="reports form">

    <h2><?php echo "Lists from " . $startDate . " to " . $endDate; ?></h2>

    <h3><?php echo "Resource Usages"; ?></h3>
    <table cellpadding = "0" cellspacing = "0">
        <tr>
            <th><?php echo __('Id'); ?></th>
            <th><?php echo __('Client Id'); ?></th>
            <th><?php echo __('Date'); ?></th>
            <th><?php echo __('Comments'); ?></th>
            <th class="actions"><?php echo __(''); ?></th>
        </tr>
        <?php
        $i = 0;
        foreach ($resourceUses as $resourceUs):
            if (strtotime($resourceUs['ResourceUse']['date']) >= $startCompare &&
                    strtotime($resourceUs['ResourceUse']['date']) <= $endCompare):
                ?>
                <tr>
                    <td><?php echo $resourceUs['ResourceUse']['id']; ?></td>
                    <td><?php echo $resourceUs['ResourceUse']['client_id']; ?></td>
                    <td><?php echo $resourceUs['ResourceUse']['date']; ?></td>
                    <td><?php echo $resourceUs['ResourceUse']['comments']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View/Edit'), array('controller' => 'resource_uses', 'action' => 'view', $resourceUs['ResourceUse']['id'])); ?>
                    </td>
                </tr>
            <?php endif; ?>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>

    <br /><br /><Br />

    <h3><?php echo "Prayer Requests"; ?></h3>
    <table cellpadding = "0" cellspacing = "0">
        <tr>
            <th><?php echo __('Id'); ?></th>
            <th><?php echo __('Client Id'); ?></th>
            <th><?php echo __('Date'); ?></th>
            <th><?php echo __('Request'); ?></th>
            <th class="actions"><?php echo __(''); ?></th>
        </tr>
        <?php
        foreach ($prayerRequests as $prayerRequest):
            if (strtotime($prayerRequest['PrayerRequest']['date']) >= $startCompare &&
                    strtotime($prayerRequest['PrayerRequest']['date']) <= $endCompare):
                ?>
                <tr>
                    <td><?php echo $prayerRequest['PrayerRequest']['id']; ?></td>
                    <td><?php echo $prayerRequest['PrayerRequest']['client_id']; ?></td>
                    <td><?php echo $prayerRequest['PrayerRequest']['date']; ?></td>
                    <td><?php echo $prayerRequest['PrayerRequest']['request']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View/Edit'), array('controller' => 'prayer_requests', 'action' => 'view', $prayerRequest['PrayerRequest']['id'])); ?>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>

    <Br /><br /><br />

    <h3><?php echo "Client Checklists"; ?></h3>
    <table cellpadding = "0" cellspacing = "0">
        <tr>
            <th><?php echo __('Id'); ?></th>
            <th><?php echo __('Client Id'); ?></th>
            <th><?php echo __('Checklist Name'); ?></th>
            <th><?php echo __('Checklist Description'); ?></th>
            <th class="actions"><?php echo __(''); ?></th>
        </tr>
        <?php foreach ($clientChecklists as $checklist): ?>
            <?php
            if ($checklist['ClientChecklist']['isCompleted'] == 0 &&
                    strtotime($checklist['ClientChecklist']['created']) <= $endCompare):
                ?>
                <tr>
                    <td><?php echo $checklist['ClientChecklist']['id'];
                ?></td>
                    <td><?php echo $checklist['ClientChecklist']['client_id']; ?></td>
                    <td><?php echo $checklist['ClientChecklist']['checklist_name']; ?></td>
                    <td><?php echo $checklist['ClientChecklist']['checklist_description']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View/Edit'), array('controller' => 'client_checklists', 'action' => 'view', $checklist['ClientChecklist']['id'])); ?>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>


</div>


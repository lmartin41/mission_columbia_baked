<?php include("reportsDiv.ctp"); ?>

<div id="chart_div"><?php $this->GoogleChart->createJsChart($chart);?></div>


<!-- <div class="reports form">

    <h2><?php echo "Client Report for " . $client['Client']['first_name'] . " from " . $startDate . " to " . $endDate; ?></h2>
    <br />

    Number of Resources Used: <?php echo $numberResourceUses; ?><br />
    Number of Checklists Completed: <?php echo $numChecklistsCompleted; ?><br />
    Number of Checklist Tasks Completed: <?php echo $numChecklistTasksCompleted; ?>

    <br /><br /><Br />
    <h3><?php echo h($client['Client']['first_name']) . " 's Resource Usage"; ?></h3>
    <?php if (!empty($client['ResourceUs'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Client Id'); ?></th>
                <th><?php echo __('Resource Name'); ?></th>
                <th><?php echo __('Date'); ?></th>
                <th><?php echo __('Comments'); ?></th>
                <th class="actions"><?php echo __(''); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($resourceUses as $resourceUs):
                if (strtotime($resourceUs['date']) >= $startCompare &&
                        strtotime($resourceUs['date']) <= $endCompare):
                    ?>
                    <tr>
                        <td><?php echo $resourceUs['id']; ?></td>
                        <td><?php echo $resourceUs['client_id']; ?></td>
                        <td><?php echo $resourceName[$i]; ?></td>
                        <td><?php echo $resourceUs['date']; ?></td>
                        <td><?php echo $resourceUs['comments']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('View/Edit'), array('controller' => 'resource_uses', 'action' => 'view', $resourceUs['id'])); ?>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    <?php else: echo "none"; ?>
    <?php endif; ?>

    <br /><br /><Br />

    <h3><?php echo h($client['Client']['first_name']) . " 's Prayer Requests"; ?></h3>
    <?php if (!empty($client['PrayerRequest'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Client Id'); ?></th>
                <th><?php echo __('Date'); ?></th>
                <th><?php echo __('Request'); ?></th>
                <th class="actions"><?php echo __(''); ?></th>
            </tr>
            <?php
            foreach ($client['PrayerRequest'] as $prayerRequest):
                if (strtotime($prayerRequest['date']) >= $startCompare &&
                        strtotime($prayerRequest['date']) <= $endCompare):
                    ?>
                    <tr>
                        <td><?php echo $prayerRequest['id']; ?></td>
                        <td><?php echo $prayerRequest['client_id']; ?></td>
                        <td><?php echo $prayerRequest['date']; ?></td>
                        <td><?php echo $prayerRequest['request']; ?></td>
                        <td class="actions">
            <?php echo $this->Html->link(__('View/Edit'), array('controller' => 'prayer_requests', 'action' => 'view', $checklist['id'])); ?>
                        </td>
                    </tr>
                <?php endif; ?>
        <?php endforeach; ?>
        </table>
    <?php else: echo "none"; ?>
<?php endif; ?>

    <Br /><br /><br />

    <h3><?php echo h($client['Client']['first_name']) . " 's Checklists"; ?></h3>
<?php if (!empty($client['ClientChecklist'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Client Id'); ?></th>
                <th><?php echo __('Checklist Name'); ?></th>
                <th><?php echo __('Checklist Description'); ?></th>
                <th class="actions"><?php echo __(''); ?></th>
            </tr>
            <?php foreach ($client['ClientChecklist'] as $checklist): ?>
                <?php
                if ($checklist['isCompleted'] == 0 &&
                        strtotime($checklist['created']) <= $endCompare): ?>
                <tr>
                <td><?php echo $checklist['id'];
                ?></td>
                <td><?php echo $checklist['client_id']; ?></td>
                <td><?php echo $checklist['checklist_name']; ?></td>
                <td><?php echo $checklist['checklist_description']; ?></td>
                <td class="actions">
                <?php echo $this->Html->link(__('View/Edit'), array('controller' => 'client_checklists', 'action' => 'view', $checklist['id'])); ?>
                </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        </table>
<?php else: echo "none"; ?>
<?php endif; ?>

    <Br /><br /><br />

    <h3>Client Status</h3>
    <dl>
        <dt><?php echo __('Pregnant'); ?></dt>
        <dd>
            &nbsp;&nbsp;
<?php echo ($client['Client']['pregnant'] == 1) ? 'yes' : 'no'; ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Disabled'); ?></dt>
        <dd>
            &nbsp;&nbsp;
<?php echo ($client['Client']['disabled'] == 1) ? 'yes' : 'no'; ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Handicapped'); ?></dt>
        <dd>
            &nbsp;&nbsp;
<?php echo ($client['Client']['handicapped'] == 1) ? 'yes' : 'no'; ?>
            &nbsp;
        </dd>
    </dl>

    <br /><br />

</div>
                
                -->
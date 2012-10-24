<h2><?php echo "Client Report for ".$client['Client']['first_name']." from ".$startDate." to ".$endDate; ?></h2>
<br />

Number of Resources Used: <?php echo $numberResourceUses; ?><br />
Number of Checklists Completed: <?php echo $numChecklistsCompleted; ?>

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
        foreach ($client['ResourceUs'] as $resourceUs):
            if ($resourceUs['client_id'] == $client['Client']['id'] && 
                    strtotime($resourceUs['date']) >= $startCompare &&
                            strtotime($resourceUs['date']) <= $endCompare): ?>
                <tr>
                    <td><?php echo $resourceUs['id']; ?></td>
                    <td><?php echo $resourceUs['client_id']; ?></td>
                    <td><?php echo $resourceUs['Resource']['resource_name']; ?></td>
                    <td><?php echo $resourceUs['date']; ?></td>
                    <td><?php echo $resourceUs['comments']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View/Edit'), array('controller' => 'resource_uses', 'action' => 'view', $resourceUs['id'])); ?>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
<?php else: echo "none"; ?>
<?php endif; ?>

<h2>Client Status</h2>

<br /><br />
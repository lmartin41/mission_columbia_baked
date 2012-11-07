<?php include("reportsDiv.ctp"); ?>

<div class="reports form">   

<h2><?php echo "Resource Report for ".$resource['Resource']['resource_name']." from ".$startDate." to ".$endDate; ?></h2>
<br />

Organization Responsible for this Resource: <?php echo $resource['Organization']['org_name']; ?><Br />
Number of Times this Resource Has Been Used: <?php echo $numberResourceUses; ?><br />
Most popular user of this Resource: <?php echo $mostPopular; ?></br /><br />
Resource Status: <?php echo $resource['Resource']['status']; ?>
Resource Inventory: <?php echo $resource['Resource']['inventory']; ?>

<h3><?php echo __('Activity History for this Resource'); ?></h3>
    <?php if (!empty($resource['ResourceUs'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Resource Id'); ?></th>
                <th><?php echo __('Date'); ?></th>
                <th><?php echo __('Comments'); ?></th>
                <th class="actions"><?php echo __(''); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($resource['ResourceUs'] as $resourceUs):
                if ($resourceUs['resource_id'] == $resource['Resource']['id'] && 
                    strtotime($resourceUs['date']) >= $startCompare &&
                            strtotime($resourceUs['date']) <= $endCompare): ?>
                <tr>
                    <td><?php echo $resourceUs['resource_id']; ?></td>
                    <td><?php echo $resourceUs['date']; ?></td>
                    <td><?php echo $resourceUs['comments']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View/Edit'), array('controller' => 'resource_uses', 'action' => 'view', $resourceUs['id'])); ?>
                    </td>
                </tr>
<?php endif; ?>
            <?php endforeach; ?>
        </table>

    <?php else: ?>
        <div class="actions">
            None
        </div>
    <?php endif; ?>

</div>

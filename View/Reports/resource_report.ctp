

<div class="reports form">   

<h2><?php echo "Resource Report for ".$resource['Resource']['resource_name']." from ".$startDate." to ".$endDate; ?></h2>
<br />

Organization Responsible for this Resource: <?php echo $resource['Organization']['org_name']; ?><Br />
Number of Times this Resource Has Been Used: <?php echo $numberResourceUses; ?><br />
Most popular user of this Resource: <?php echo $mostPopular; ?></br /><br />

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

<div class="actionsNoButton">
    <?php echo $this->Html->link(__('Individual Reports'), array()); ?><br />
    <ul>
        <li><?php echo $this->Html->link(__('Clients'), array('action' => 'index')); ?></li><br />
        <li><?php echo $this->Html->link(__('Resources'), array('action' => 'resourceIndex')); ?></li><br />
    </ul>
    <?php echo $this->Html->link(__('Aggregate Reports'), array()); ?><br />
    <ul>
         <li><?php echo $this->Html->link('Clients', array('action' => 'aggregateClientsIndex')); ?></li><br />
        <li><?php echo $this->Html->link('Resources', array('action' => 'aggregateResourcesIndex')); ?></li>
    </ul>
    <br />
        <?php echo $this->Html->link('Resource Listing', array('controller' => 'resources', 'action' => 'index')); ?>

</div>
<div class="reports form">

    <h2><?php echo "Client Report for " . $client['Client']['first_name'] . " from " . $startDate . " to " . $endDate; ?></h2>
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
                <th><?php echo __('Resource ID'); ?></th>
                <th><?php echo __('Date'); ?></th>
                <th><?php echo __('Comments'); ?></th>
                <th class="actions"><?php echo __(''); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($client['ResourceUs'] as $resourceUs):
                if ($resourceUs['client_id'] == $client['Client']['id'] &&
                        strtotime($resourceUs['date']) >= $startCompare &&
                        strtotime($resourceUs['date']) <= $endCompare):
                    ?>
                    <tr>
                        <td><?php echo $resourceUs['id']; ?></td>
                        <td><?php echo $resourceUs['client_id']; ?></td>
                        <td><?php echo $resourceUs['resource_id'] ?></td>
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

    <br /><br />

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
<?php echo $this->Html->link('Client Listing', array('controller' => 'clients', 'action' => 'browse')); ?>

</div>
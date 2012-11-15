<?php include("reportsDiv.ctp"); ?>
<div class="reports form">

    <div id="chart_div"><?php $this->GoogleChart->createJsChart($chart); ?></div>

    Number of Times this Resource has Been Used During this Period: <?php echo $numberResourceUses; ?><br /><br />

    <h3><?php echo __('Resource Usage Listing'); ?></h3>
    <?php if (!empty($resource['ResourceUs'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Client Id'); ?></th>
                <th><?php echo __('Resource Id'); ?></th>
                <th><?php echo __('Date'); ?></th>
                <th><?php echo __('Comments'); ?></th>
                <th class="actions"><?php echo __(''); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($resource['ResourceUs'] as $resourceUs):
                ?>
                <tr>
                    <td><?php echo $resourceUs['client_id']; ?></td>
                    <td><?php echo $resourceUs['resource_id']; ?></td>
                    <td><?php echo $resourceUs['date']; ?></td>
                    <td><?php echo $resourceUs['comments']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View/Edit'), array('controller' => 'resource_uses', 'action' => 'view', $resourceUs['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php else: ?>
        <div class="actions">
            None
        </div>
    <?php endif; ?>
</div>

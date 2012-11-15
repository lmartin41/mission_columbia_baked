<?php include("reportsDiv.ctp"); ?>
<div class="reports form">

    <div id="chart_div"><?php $this->GoogleChart->createJsChart($chart); ?></div>

    Number of Resources Used During this Period: <?php echo $numberResourceUses; ?><br /><br />

    <h3><?php echo h($client['Client']['first_name']) . " 's Resource Usage Listing"; ?></h3>
    <?php if (!empty($client['ResourceUs'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Organization'); ?></th>
                <th><?php echo __('Resource Name'); ?></th>
                <th><?php echo __('Date'); ?></th>
                <th><?php echo __('Comments'); ?></th>
                <th class="actions"><?php echo __(''); ?></th>
            </tr>
            <?php
            $j = 0;
            foreach ($resourceUses as $resourceUs):
                ?>
                <tr>
                    <td><?php echo $organizationName[$j]; ?></td>
                    <td><?php echo $resourceName[$j]; ?></td>
                    <td><?php echo $resourceUs['date']; ?></td>
                    <td><?php echo $resourceUs['comments']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View/Edit'), array('controller' => 'ResourceUses', 'action' => 'view', $resourceUs['id'])); ?>
                    </td>
                </tr>
                <?php $j++; ?>
            <?php endforeach; ?>
        </table>
    <?php else: echo "none"; ?>
    <?php endif; ?>

    <br /><br />
</div>



    <h2><?php echo h($client['Client']['first_name']) . " 's Resource Usage"; ?></h2>

    <?php if (!empty($client['ResourceUs'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Client Id'); ?></th>
                <th><?php echo __('Resource Name'); ?></th>
                <th><?php echo __('Date'); ?></th>
                <th><?php echo __('Comments'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($client['ResourceUs'] as $resourceUs):
                if ($resourceUs['client_id'] == $client['Client']['id']):
                    ?>
                    <tr>
                        <td><?php echo $resourceUs['id']; ?></td>
                        <td><?php echo $resourceUs['client_id']; ?></td>
                        <td><?php echo $resourceUs['Resource']['resource_name']; ?></td>
                        <td><?php echo $resourceUs['date']; ?></td>
                        <td><?php echo $resourceUs['comments']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('View'), array('controller' => 'resource_uses', 'action' => 'view', $resourceUs['id'])); ?>
                            <?php echo $this->Html->link(__('Edit'), array('controller' => 'resource_uses', 'action' => 'edit', $resourceUs['id'])); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'resource_uses', 'action' => 'delete', $resourceUs['id']), null, __('Are you sure you want to delete # %s?', $resourceUs['id'])); ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    <?php else: echo "none"; ?>
    <?php endif; ?>

    <br /><br />
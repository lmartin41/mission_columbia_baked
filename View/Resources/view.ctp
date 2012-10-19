<div class="resources view">
    <h2><?php echo __('Resources'); ?></h2>
    <br />
    <?php echo $this->Html->image('resource.jpeg', array('alt' => 'Sample Photo')) ?>
    <br /><br /><br />
    <dl>
        <dt><?php echo __('Resource Name'); ?></dt>
        <dd>
            <?php echo h($resource['Resource']['resource_name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Organization'); ?></dt>
        <dd>
            <?php echo $this->Html->link($resource['Organization']['org_name'], array('controller' => 'organizations', 'action' => 'view', $resource['Organization']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Status'); ?></dt>
        <dd>
            <?php echo h($resource['Resource']['resource_status']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Description'); ?></dt>
        <dd>
            <?php echo h($resource['Resource']['description']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Inventory'); ?></dt>
        <dd>
            <?php echo h($resource['Resource']['inventory']); ?>
            &nbsp;
        </dd>
    </dl>

    <br /><br />
    <h2><?php echo __('Activity History for this Resource'); ?></h2>
    <?php if (!empty($resource['ResourceUs'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Client Id'); ?></th>
                <th><?php echo __('Resource Id'); ?></th>
                <th><?php echo __('Date'); ?></th>
                <th><?php echo __('Comments'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
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
                        <?php echo $this->Html->link(__('View'), array('controller' => 'resource_uses', 'action' => 'view', $resourceUs['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'resource_uses', 'action' => 'edit', $resourceUs['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'resource_uses', 'action' => 'delete', $resourceUs['id']), null, __('Are you sure you want to delete # %s?', $resourceUs['id'])); ?>
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

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Resource'), array('action' => 'edit', $resource['Resource']['id'], $resource['Resource']['organization_id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Resource'), array('action' => 'delete', $resource['Resource']['id']), null, __('Are you sure you want to delete # %s?', $resource['Resource']['resource_name'])); ?> </li>
        <li><?php echo $this->Html->link(__('Resource Listing'), array('action' => 'index')); ?> </li>
    </ul>
</div>

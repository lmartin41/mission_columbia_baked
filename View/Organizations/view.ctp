<div class="organizations view">
    <h2><?php echo __('Organization'); ?></h2>
    <br />
    <?php echo $this->Html->image('organization.jpg', array('alt' => 'Sample Photo')); ?>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($organization['Organization']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Org Name'); ?></dt>
        <dd>
            <?php echo h($organization['Organization']['org_name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Org Type'); ?></dt>
        <dd>
            <?php echo h($organization['Organization']['org_type']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Address One'); ?></dt>
        <dd>
            <?php echo h($organization['Organization']['address_one']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Address Two'); ?></dt>
        <dd>
            <?php echo h($organization['Organization']['address_two']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('City'); ?></dt>
        <dd>
            <?php echo h($organization['Organization']['city']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('State'); ?></dt>
        <dd>
            <?php echo h($organization['Organization']['state']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Zip'); ?></dt>
        <dd>
            <?php echo h($organization['Organization']['zip']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Contact'); ?></dt>
        <dd>
            <?php echo h($organization['Organization']['contact']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Website'); ?></dt>
        <dd>
            <?php echo h($organization['Organization']['website']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Phone'); ?></dt>
        <dd>
            <?php echo h($organization['Organization']['phone']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Phone Cell'); ?></dt>
        <dd>
            <?php echo h($organization['Organization']['phone_cell']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Phone Office'); ?></dt>
        <dd>
            <?php echo h($organization['Organization']['phone_office']); ?>
            &nbsp;
        </dd>
    </dl>

    <br /><br />
<?php /****************** Resource **********************************/ ?>
    
    <h2><?php echo __('Related Resources'); ?></h2>
    <?php if (!empty($organization['Resource'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Resource Name'); ?></th>
                <th><?php echo __('Organization Id'); ?></th>
                <th><?php echo __('Resource Status'); ?></th>
                <th><?php echo __('IsDeleted'); ?></th>
                <th><?php echo __('Created'); ?></th>
                <th><?php echo __('Modified'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($organization['Resource'] as $resource):
                ?>
                <tr>
                    <td><?php echo $resource['id']; ?></td>
                    <td><?php echo $resource['resource_name']; ?></td>
                    <td><?php echo $resource['organization_id']; ?></td>
                    <td><?php echo $resource['resource_status']; ?></td>
                    <td><?php echo $resource['isDeleted']; ?></td>
                    <td><?php echo $resource['created']; ?></td>
                    <td><?php echo $resource['modified']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'resources', 'action' => 'view', $resource['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'resources', 'action' => 'edit', $resource['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'resources', 'action' => 'delete', $resource['id']), null, __('Are you sure you want to delete # %s?', $resource['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php else: ?>
        <div class="actions">
            <ul>
                None
            </ul>
        </div>
    <?php endif; ?>

    <br /><br /><br />

    <h2><?php echo __('Related Users'); ?></h2>
    <?php if (!empty($organization['User'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('Username'); ?></th>
                <th><?php echo __('Password'); ?></th>
                <th><?php echo __('IsAdmin'); ?></th>
                <th><?php echo __('IsSuperAdmin'); ?></th>
                <th><?php echo __('Organization Id'); ?></th>
                <th><?php echo __('Email'); ?></th>
                <th><?php echo __('IsDeleted'); ?></th>
                <th><?php echo __('Created'); ?></th>
                <th><?php echo __('Modified'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach ($organization['User'] as $user):
                ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['password']; ?></td>
                    <td><?php echo $user['isAdmin']; ?></td>
                    <td><?php echo $user['isSuperAdmin']; ?></td>
                    <td><?php echo $user['organization_id']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['isDeleted']; ?></td>
                    <td><?php echo $user['created']; ?></td>
                    <td><?php echo $user['modified']; ?></td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    <?php else: ?>
        <div class="actions">
            <ul>
                None
            </ul>
        </div>
    <?php endif; ?>
</div>


    <div class="actions">
        <h3><?php echo __('Actions'); ?></h3>
        <ul>
            <li><?php echo $this->Html->link(__('Edit Organization'), array('action' => 'edit', $organization['Organization']['id'])); ?> </li>
            <li><?php echo $this->Form->postLink(__('Delete Organization'), array('action' => 'delete', $organization['Organization']['id']), null, __('Are you sure you want to delete # %s?', $organization['Organization']['id'])); ?> </li>
            <li><?php echo $this->Html->link(__('List Organizations'), array('action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Organization'), array('action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        </ul>
    </div>

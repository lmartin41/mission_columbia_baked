<div class="actionsNoButton">
    <?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?><br />
    <?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?><br />
    <?php echo $this->Html->link(__('View User'), array('action' => 'view', $user['User']['id']), array('class' => 'active_link')); ?><br />
    <?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?><br />
    <?php echo $this->Html->link(__('Change Password'), array('action' => 'editPassword', $this->Form->value('User.id'))); ?><br />
    <?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete %s?', $user['User']['username'])); ?><br />

    <?php if (empty($doesFormExist)): ?>
        <?php echo $this->Html->link('Volunteer Information Form', array('controller' => 'VolunteerInformationForms', 'action' => 'add', $user['User']['id'])); ?>
    <?php else: ?>
        <?php echo $this->Html->link('Volunteer Information Form', array('controller' => 'VolunteerInformationForms', 'action' => 'view', $doesFormExist['VolunteerInformationForm']['id'], $user['User']['id'])); ?>
    <?php endif; ?>
</div>
<div class="users view">
    <h2><?php echo __('User'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($user['User']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Username'); ?></dt>
        <dd>
            <?php echo h($user['User']['username']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('IsAdmin'); ?></dt>
        <dd>
            <?php echo (($user['User']['isAdmin']) ? "true" : "false"); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('IsSuperAdmin'); ?></dt>
        <dd>
            <?php echo (($user['User']['isSuperAdmin']) ? "true" : "false"); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Organization'); ?></dt>
        <dd>
            <?php echo $this->Html->link($user['Organization']['org_name'], array('controller' => 'organizations', 'action' => 'view', $user['Organization']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Email'); ?></dt>
        <dd>
            <?php echo h($user['User']['email']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('IsDeleted'); ?></dt>
        <dd>
            <?php echo h($user['User']['isDeleted']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($user['User']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($user['User']['modified']); ?>
            &nbsp;
        </dd>
    </dl>
    <br />
    <div class="related">
        <h3><?php echo __($user['User']['username'] . "'s Feedbacks"); ?></h3>
        <?php if (!empty($user['Feedback'])): ?>
            <table>
                <tr>
                    <th><?php echo __('Id'); ?></th>
                    <th><?php echo __('User Id'); ?></th>
                    <th><?php echo __('Feedback'); ?></th>
                    <th><?php echo __('Created'); ?></th>
                    <th><?php echo __('Modified'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php
                $i = 0;
                foreach ($user['Feedback'] as $feedback):
                    ?>
                    <tr>
                        <td><?php echo $feedback['id']; ?></td>
                        <td><?php echo $feedback['user_id']; ?></td>
                        <td><?php echo $feedback['feedback']; ?></td>
                        <td><?php echo $feedback['created']; ?></td>
                        <td><?php echo $feedback['modified']; ?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('View'), array('controller' => 'feedbacks', 'action' => 'view', $feedback['id'])); ?>
                            <?php echo $this->Html->link(__('Edit'), array('controller' => 'feedbacks', 'action' => 'edit', $feedback['id'])); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'feedbacks', 'action' => 'delete', $feedback['id']), null, __('Are you sure you want to delete # %s?', $feedback['id'])); ?>
                        </td>
                    </tr>
            <?php endforeach; ?>
            </table>
        <?php endif; ?>

    </div>
</div>

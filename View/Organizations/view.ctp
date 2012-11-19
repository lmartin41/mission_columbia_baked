<?php echo $this->Html->script("client_view.js", FALSE); ?>
<?php echo $this->Html->css('classicTheme/style'); ?>
<?php echo $this->Html->script('ajaxupload-min.js', FALSE); ?>

<div class="actionsNoButton">

    <?php echo $this->Html->link(__('Organization Listing'), array('action' => 'index')); ?><br />
    <?php if ($isAtleastAdmin): ?>
        <?php echo $this->Html->link(__('New Organization'), array('action' => 'add')); ?><br />
        <?php echo $this->Html->link(__('Edit Organization'), array('action' => 'edit', $organization['Organization']['id'])); ?><br />
        <?php echo $this->Form->postLink(__('Delete Organization'), array('action' => 'delete', $organization['Organization']['id']), null, __('Are you sure you want to delete %s?', $organization['Organization']['org_name'])); ?><br />
    <?php endif; ?>
        
</div>

<div class="organizations view">
    <h2><?php echo __($organization['Organization']['org_name']); ?></h2>
    <br />
    <?php echo $this->Html->image($imagePath, array('alt' => 'Sample Photo', 'height' => '30%', 'width' => '30%')); ?>

    <div id="accordion">
        <h2>Organization Information</h2>
        <div class="white-background black-text">
            <dl>
                <dt><?php echo __('Org Name'); ?></dt>
                <dd>
                    <?php echo h($organization['Organization']['org_name']); ?>
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
        </div>
        <?php /*         * **************** Resource ********************************* */ ?>

        <h2><?php echo __($organization['Organization']['org_name'] . "'s Resources"); ?></h2>
        <div class="white-background black-text">
            <?php if (!empty($organization['Resource'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                    <tr>
                        <th><?php echo __('Resource Name'); ?></th>
                        <th><?php echo __('Resource Status'); ?></th>
                        <th class="actions"><?php echo __(''); ?></th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach ($organization['Resource'] as $resource):
                        ?>
                        <tr>
                            <td><?php echo $resource['resource_name']; ?></td>
                            <td><?php echo $resource['resource_status']; ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('View/Edit'), array('controller' => 'resources', 'action' => 'view', $resource['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            <?php else: ?>
                <div class="actions">
                    <ul>
                        <li>None</li>
                    </ul>
                </div>
            <?php endif; ?>

            <br /><br /><br />

        </div>
        <h2><?php echo __($organization['Organization']['org_name'] . "'s Users"); ?></h2>
        <div class="white-background black-text">
            <?php if (!empty($organization['User'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                    <tr>
                        <th><?php echo __('Username'); ?></th>
                        <th><?php echo __('Email'); ?></th>

                        <th class="actions"><?php echo __(''); ?></th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach ($organization['User'] as $user):
                        ?>
                        <tr>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td class="actions">
                                <?php if($isAtleastAdmin) echo $this->Html->link(__('View/Edit'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
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
        <h2>Upload Photo</h2>
        <div class="white-background black-text">
            <div id="demo1" style="width:500px">
                <script type="text/javascript">
                    $('#demo1').ajaxupload({
                        url:'/mission_columbia_baked/webroot/upload.php?id="organization-<?php echo h($organization["Organization"]["id"]); ?>',
                        remotePath:<?php echo $remotePath; ?>,
                        editFilename: true
                    });
                </script>
            </div>
        </div>
    </div>
</div>

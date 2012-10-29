<?php echo $this->Html->script("client_view.js", FALSE); ?>
<?php echo $this->Html->script('ajaxupload-min.js', FALSE); ?>

<div class="actionsNoButton">
    <?php echo $this->Html->link(__('Edit Resource'), array('action' => 'edit', $resource['Resource']['id'], $resource['Resource']['organization_id'])); ?><br />
    <?php echo $this->Form->postLink(__('Delete Resource'), array('action' => 'delete', $resource['Resource']['id']), null, __('Are you sure you want to delete # %s?', $resource['Resource']['resource_name'])); ?><br />
    <?php echo $this->Html->link(__('Resource Listing'), array('action' => 'index')); ?>
</div>

<div class="resources view">

    <h2><?php echo __('Resources'); ?></h2><br />
    <?php echo $this->Html->image('resource.jpeg', array('alt' => 'Sample Photo', 'width' => '30%', 'height' => '30%')) ?>
    <div id="accordion">
        <h2>Resource Information</h2>
        <div class="white-background black-text">
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
        </div>
        <h2><?php echo __('Activity History for this Resource'); ?></h2>
        <div class="white-background black-text">
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
        <h2>Upload Photo</h2>
        <div class="white-background black-text">
            <div id="demo1" style="width:500px">
                <script type="text/javascript">
                    $('#demo1').ajaxupload({
                        url:'/mission_columbia_baked/webroot/upload.php',
                        remotePath:'C:/wamp/www/mission_columbia_baked/webroot/img'
                    });
                </script>
            </div>
        </div>
    </div>
</div>

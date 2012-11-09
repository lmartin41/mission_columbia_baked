<?php echo $this->Html->script("client_view.js", FALSE); ?>
<?php echo $this->Html->script('ajaxupload-min.js', FALSE); ?>
<?php echo $this->Html->css('classicTheme/style'); ?>

<div class="actionsNoButton client">
    <?php echo $this->Html->link(__('Search Clients'), array('action' => 'index')); ?><br />
    <?php echo $this->Html->link(__('Add a Client'), array('action' => 'add')); ?><br />
    <?php echo $this->Html->link(__('Browse Clients'), array('action' => 'browse')); ?><br />
    <?php echo $this->Html->link(__('Edit This Client'), array('action' => 'edit', $client['Client']['id'])); ?><br />
    <?php echo $this->Html->link(__('Add Resource Use'), array('controller' => 'resource_uses', 'action' => 'add', $client['Client']['id'])); ?><br />
    <?php echo $this->Html->link(__('Client Checklist'), array('controller' => 'client_checklists', 'action' => 'index', $client['Client']['id'])); ?><br />
    <?php echo $this->Html->link(__('Prayer Requests'), array('controller' => 'prayer_requests', 'action' => 'index', $client['Client']['id'])); ?><br />
    <?php echo $this->Html->link(__('Print Client Summary'), array('action' => 'printClient', $client['Client']['id'])); ?><br />
    <?php echo $this->Form->postLink(__('Delete This Client'), array('action' => 'delete', $client['Client']['id']), null, __('Are you sure you want to delete %s?', $client['Client']['first_name'])); ?>
</div>
<div class="clients view">
    <h2><?php echo $client['Client']['first_name'] . " " . $client['Client']['last_name'] . "'s Profile"; ?></h2>
    <table>
        <tr>
            <td>
                <?php echo $this->Html->image($imagePath, array('alt' => 'Sample Photo', 'style' => "float: left; width:200px; height:200px")); ?>
            </td>
            <td>
                <h3><?php echo $client['Client']['first_name'] . " " . $client['Client']['last_name'] . "'s Personal Information" ?></h3>
                <dl>

                    <dt><?php echo __('First Name'); ?></dt>
                    <dd>
                        &nbsp;&nbsp;
                        <?php echo h($client['Client']['first_name']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Last Name'); ?></dt>
                    <dd>
                        &nbsp;&nbsp;
                        <?php echo h($client['Client']['last_name']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('DOB'); ?></dt>
                    <dd>
                        &nbsp;&nbsp;
                        <?php echo h($client['Client']['DOB']); ?>
                        &nbsp;
                    </dd>
                    <dt><?php echo __('Sex'); ?></dt>
                    <dd>
                        &nbsp;&nbsp;
                        <?php echo h($client['Client']['sex']); ?>
                        &nbsp;
                    </dd>
                </dl>
            </td>
        </tr>

    </table>

    <div id="accordion">

        <h2>Contact Information</h2>
        <div class="white-background black-text">
            <dl>
                <dt><?php echo __('Address:'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['address_one']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Apartment Number:'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['apartment_number']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('City:'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['city']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('State:'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['state']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Zip:'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['zip']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Phone:'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['phone']); ?>
                    &nbsp;
                </dd>
            </dl>
        </div>
        <h2>Source of Income</h2>
        <div class="white-background black-text">
            <dl>
                <dt><?php echo __('Regular Job'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['regular_job']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Food Stamps'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['food_stamps']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Veterans Pension'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['veterans_pension']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Part Time Job'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['part_time_job']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Social Security'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['social_security']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Annuity Check'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['annuity_check']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Child Support'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['child_support']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Ssi Or Disability'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['ssi_or_disability']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Unemployment'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['unemployment']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('When Next Check'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['when_next_check']); ?>
                    &nbsp;
                </dd>
            </dl>
        </div>
        <h2>Other Information</h2>
        <div class="white-background black-text">
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
                <dt><?php echo __('Stove'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo ($client['Client']['stove'] == 1) ? 'yes' : 'no'; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Refrigerator'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo ($client['Client']['refrigerator'] == 1) ? 'yes' : 'no'; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Cell'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo ($client['Client']['cell'] == 1) ? 'yes' : 'no'; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Cable'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo ($client['Client']['cable'] == 1) ? 'yes' : 'no'; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Internet'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo ($client['Client']['internet'] == 1) ? 'yes' : 'no'; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Accepted Christ?'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo ($client['Client']['acceptedChrist'] == 1) ? 'yes' : 'no'; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Dedicated Life to Christ?'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo ($client['Client']['dedicatedChrist'] == 1) ? 'yes' : 'no'; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Model of Car'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo $client['Client']['model']; ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('How Did You Hear'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['how_did_you_hear']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('How Long Do You Need'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['how_long_do_you_need']); ?>
                    &nbsp;
                </dd>
            </dl>
        </div>

        <?php /*         * *************** Relatives ***************************************** */ ?>


        <h2><?php echo h($client['Client']['first_name']) . " 's Relatives"; ?></h2>
        <div class="white-background black-text">
            <?php if (!empty($client['ClientRelation'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                    <tr>
                        <th><?php echo __('Id'); ?></th>
                        <th><?php echo __('First Name'); ?></th>
                        <th><?php echo __('Last Name'); ?></th>
                        <th><?php echo __('Relationship'); ?></th>
                        <th><?php echo __('DOB'); ?></th>
                        <th><?php echo __('Sex'); ?></th>
                        <th class="actions"><?php echo __(''); ?></th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach ($client['ClientRelation'] as $clientRelation):
                        if ($clientRelation['client_id'] == $client['Client']['id']):
                            ?>
                            <tr>
                                <td><?php echo $clientRelation['id']; ?></td>
                                <td><?php echo $clientRelation['first_name']; ?></td>
                                <td><?php echo $clientRelation['last_name']; ?></td>
                                <td><?php echo $clientRelation['relationship']; ?></td>
                                <td><?php echo $clientRelation['DOB']; ?></td>
                                <td><?php echo $clientRelation['sex']; ?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link(__('View/Edit'), array('controller' => 'client_relations', 'action' => 'view', $clientRelation['id'])); ?>

                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </table>

            <?php endif; ?>
            <br /><br />
            <?php echo $this->Html->link(__('Add a New Relative'), array('controller' => 'client_relations', 'action' => 'add', $client['Client']['id'])); ?>
        </div>

        <?php /*         * *************************** resource uses ************* */ ?>

        <h2><?php echo h($client['Client']['first_name']) . " 's Resource Usage"; ?></h2>
        <div class="white-background black-text">
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
            <?php echo $this->Html->link('Add new Resource Use for this Client', array('controller' => 'resource_uses', 'action' => 'add', $client['Client']['id'])); ?>
        </div>

        <h2><?php echo h($client['Client']['first_name']) . " 's Checklists"; ?></h2>
        <div class="white-background black-text">
            <?php if (!empty($client['ClientChecklist'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                    <tr>
                        <th><?php echo __('Id'); ?></th>
                        <th><?php echo __('Client Id'); ?></th>
                        <th><?php echo __('Checklist Name'); ?></th>
                        <th><?php echo __('Checklist Description'); ?></th>
                        <th class="actions"><?php echo __(''); ?></th>
                    </tr>
                    <?php foreach ($client['ClientChecklist'] as $checklist): ?>
                        <tr>
                            <td><?php echo $checklist['id']; ?></td>
                            <td><?php echo $checklist['client_id']; ?></td>
                            <td><?php echo $checklist['checklist_name']; ?></td>
                            <td><?php echo $checklist['checklist_description']; ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('View/Edit'), array('controller' => 'client_checklists', 'action' => 'view', $checklist['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: echo "none"; ?>
            <?php endif; ?>

            <br /><br />
            <?php echo $this->Html->link('Add new Checklist for this Client', array('controller' => 'client_checklists', 'action' => 'add', $client['Client']['id'])); ?>
        </div>
        
        <h2><?php echo h($client['Client']['first_name']) . " 's Prayer Requests"; ?></h2>
        <div class="white-background black-text">
            <?php if (!empty($client['PrayerRequest'])): ?>
                <table cellpadding = "0" cellspacing = "0">
                    <tr>
                        <th><?php echo __('Id'); ?></th>
                        <th><?php echo __('Client Id'); ?></th>
                        <th><?php echo __('Date'); ?></th>
                        <th><?php echo __('Request'); ?></th>
                        <th class="actions"><?php echo __(''); ?></th>
                    </tr>
                    <?php foreach ($client['PrayerRequest'] as $prayerRequest): ?>
                        <tr>
                            <td><?php echo $prayerRequest['id']; ?></td>
                            <td><?php echo $prayerRequest['client_id']; ?></td>
                            <td><?php echo $prayerRequest['date']; ?></td>
                            <td><?php echo $prayerRequest['request']; ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('View/Edit'), array('controller' => 'prayer_requests', 'action' => 'view', $prayerRequest['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: echo "none"; ?>
            <?php endif; ?>

            <br /><br />
            <?php echo $this->Html->link('Add new Prayer Request for this Client', array('controller' => 'prayer_requests', 'action' => 'add', $client['Client']['id'])); ?>
        </div>

        <h2>Upload Photo</h2>
        <div class="white-background black-text">
        	<div id="image_upload" style="width:500px">
                <script type="text/javascript">
                    $('#image_upload').ajaxupload({
                        url:'/mission_columbia_baked/webroot/upload.php?id="client-<?php echo ($client["Client"]["id"]); ?>',
                        remotePath:'C:/wamp/www/mission_columbia_baked/webroot/uploaded_images',
                        editFilename: true
                    });
                </script>
            </div>
        </div>
    </div>
</div>


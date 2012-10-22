<?php echo $this->Html->script("client_view.js", FALSE); ?>

<?php echo $this->Html->script('ajaxupload-min.js'); ?>
<?php echo $this->Html->css('baseTheme.style'); ?>

<div class="clients view">
    <h2><?php echo __($client['Client']['first_name'] . "'s Details"); ?></h2>
    <br />

    <tr>
        <td>
            <div id="demo1" style="width:500px"></div>
            <script type="text/javascript">
                $('#demo1').ajaxupload({
                    url:'upload.php',
                    remotePath:'uploaded/',
                });
            </script>
        </td>

    </tr>

    <?php echo $this->Html->image('person.png', array('alt' => 'Sample Photo')); ?>
    <div id="accordion">
        <h2>Personal Information</h2>
        <div class="white-background black-text">
            <dl>
                <dt><?php echo __('Id'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['id']); ?>
                    &nbsp;
                </dd>
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
        </div>
        <h2>Contact Information</h2>
        <div class="white-background black-text">
            <dl>
                <dt><?php echo __('Address'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['address_one']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('City'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['city']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('State'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['state']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Zip'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['zip']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Phone'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['phone']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Apartment Number'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['apartment_number']); ?>
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
                    <?php echo h($client['Client']['pregnant']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Disabled'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['disabled']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Handicapped'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['handicapped']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Stove'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['stove']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Refrigerator'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['refrigerator']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Cell'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['cell']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Cable'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['cable']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Internet'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['internet']); ?>
                    &nbsp;
                </dd>
                <dt><?php echo __('Model'); ?></dt>
                <dd>
                    &nbsp;&nbsp;
                    <?php echo h($client['Client']['model']); ?>
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
    </div>
    <br /><br />
    <?php echo $this->Html->link(__('Edit Details for ' . $client['Client']['first_name']), array('action' => 'edit', $client['Client']['id'])); ?>
    <br /><br /><br />
    <?php /*     * *************** Relatives ***************************************** */ ?>


    <h2><?php echo h($client['Client']['first_name']) . " 's Relatives"; ?></h2>
    <?php if (!empty($client['ClientRelation'])): ?>
        <table cellpadding = "0" cellspacing = "0">
            <tr>
                <th><?php echo __('Id'); ?></th>
                <th><?php echo __('First Name'); ?></th>
                <th><?php echo __('Last Name'); ?></th>
                <th><?php echo __('Relationship'); ?></th>
                <th><?php echo __('DOB'); ?></th>
                <th><?php echo __('Sex'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
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
                            <?php echo $this->Html->link(__('View'), array('controller' => 'client_relations', 'action' => 'view', $clientRelation['id'])); ?>
                            <?php echo $this->Html->link(__('Edit'), array('controller' => 'client_relations', 'action' => 'edit', $clientRelation['id'], $client['Client']['id'])); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'client_relations', 'action' => 'delete', $clientRelation['id'], $client['Client']['id']), null, __('Are you sure you want to delete %s?', $clientRelation['first_name'])); ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>

    <?php endif; ?>
    <br />
    <?php echo $this->Html->link(__('Add a New Relative'), array('controller' => 'client_relations', 'action' => 'add', $client['Client']['id'])); ?>



    <br /><br /><br />

    <?php /*     * *************************** resource uses ************* */ ?>

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
    <?php echo $this->Html->link('Add new Resource Use for this Client', array('controller' => 'Resourceuses', 'action' => 'add', $client['Client']['id'])); ?>
</div>
<div class="actionsNoButton">

    <?php echo $this->Html->link(__('Search for a Client'), array('action' => 'index')); ?> <br /><br />
    <?php echo $this->Html->link(__('Client Listing'), array('action' => 'browse')); ?> <br /><br />
    <?php echo $this->Html->link(__('Edit This Client'), array('action' => 'edit', $client['Client']['id'])); ?> <br /><br />
    <?php echo $this->Form->postLink(__('Delete This Client'), array('action' => 'delete', $client['Client']['id']), null, __('Are you sure you want to delete %s?', $client['Client']['first_name'])); ?><br /><br />
    <?php echo $this->Html->link(__('Print this Client Summary'), array('action' => 'printClient', $client['Client']['id'])); ?> 	<br /><br />
    <?php echo $this->Html->link(__('Create new Client'), array('action' => 'add')); ?> 	

</div>


<?php echo $this->Html->image('mission_logo.png', array('alt' => 'Sample Photo')); ?>

<h2><?php echo __($client['Client']['first_name'] . "'s Summary"); ?></h2>
<dl>
    <h3>Personal Information</h3>
    <?php echo __('Id'); ?> 
    &nbsp;&nbsp;
    <?php echo h($client['Client']['id']); ?>
    <br />
    <?php echo __('First Name'); ?> 
    &nbsp;&nbsp; 
    <?php echo h($client['Client']['first_name']); ?>
    <br />
    <?php echo __('Last Name'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['last_name']); ?>
    <br />
    <?php echo __('DOB'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['DOB']); ?>
    <br />
    <?php echo __('Sex'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['sex']); ?>
    <br />
    <br />
    <h3>Contact Information</h3>

    <?php echo __('Address'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['address_one']); ?>
    <br />
    <?php echo __('City'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['city']); ?>
    <br />
    <?php echo __('State'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['state']); ?>
    <br />
    <?php echo __('Zip'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['zip']); ?>
    <br />
    <?php echo __('Phone'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['phone']); ?>
    <br />
    <?php echo __('Apartment Number'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['apartment_number']); ?>
    
    <br /><br />
    <h3>Source of Income</h3>
    <?php echo __('Regular Job'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['regular_job']); ?>
    <br />
    <?php echo __('Food Stamps'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['food_stamps']); ?>
    <br />
    <?php echo __('Veterans Pension'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['veterans_pension']); ?>
    <br />
    <?php echo __('Part Time Job'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['part_time_job']); ?>
    <br />
    <?php echo __('Social Security'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['social_security']); ?>
    <br />
    <?php echo __('Annuity Check'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['annuity_check']); ?>
    <br />
    <?php echo __('Child Support'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['child_support']); ?>
    <br />
    <?php echo __('Ssi Or Disability'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['ssi_or_disability']); ?>
    <br />
    <?php echo __('Unemployment'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['unemployment']); ?>
    <br />
    <?php echo __('When Next Check'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['when_next_check']); ?>
    <br />
    </dd>
    <br /><br />
    <h3>Other Information</h3>
    <?php echo __('Pregnant'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['pregnant']); ?>
    <br />
    <?php echo __('Disabled'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['disabled']); ?>
    <br />
    <?php echo __('Handicapped'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['handicapped']); ?>
    <br />
    <?php echo __('Stove'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['stove']); ?>
    <br />
    <?php echo __('Refrigerator'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['refrigerator']); ?>
    <br />
    <?php echo __('Cell'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['cell']); ?>
    <br />
    <?php echo __('Cable'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['cable']); ?>
    <br />
    <?php echo __('Internet'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['internet']); ?>
    <br />
    <?php echo __('Model'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['model']); ?>
    <br />
    <?php echo __('How Did You Hear'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['how_did_you_hear']); ?>
    <br />
    <?php echo __('How Long Do You Need'); ?>
    &nbsp;&nbsp;
    <?php echo h($client['Client']['how_long_do_you_need']); ?>
    <br />


<br /><br /><br />
<?php /* * *************** Relatives ***************************************** */ ?>


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

                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>

<?php endif; ?>

<br /><br /><br />

<?php /* * *************************** resource uses ************* */ ?>

<h2><?php echo h($client['Client']['first_name']) . " 's Resource Usage"; ?></h2>

<?php if (!empty($client['ResourceUs'])): ?>
    <table cellpadding = "0" cellspacing = "0">
        <tr>
            <th><?php echo __('Id'); ?></th>
            <th><?php echo __('Client Id'); ?></th>
            <th><?php echo __('Resource Name'); ?></th>
            <th><?php echo __('Date'); ?></th>
            <th><?php echo __('Comments'); ?></th>
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
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
<?php else: echo "none"; ?>
<?php endif; ?>

<br /><br />



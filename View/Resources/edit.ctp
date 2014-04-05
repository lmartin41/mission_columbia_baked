<?php echo $this->Html->script('https://maps-api-ssl.google.com/maps/api/js?key=AIzaSyC22n51FklMDzv3wwoc7kH4nxKO0fo2wTI&sensor=true', false); ?>
<?php echo $this->Html->script('geocode.js', false); ?>
<?php echo $this->Html->script('Resources/geocode_address.js', false); ?>

<style type="text/css">
    form label { 
        width: 10em; 
        float: left;
        padding: 0px;
    }
</style>

<div class="actionsNoButton">

    <?php
    echo $this->Form->postLink(__('Delete this Resource'), array('action' =>
        'delete', $this->Form->value('Resource.id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Resource.resource_name')));
    ?><br />
    <?php echo $this->Html->link(__('Resource Listing'), array('action' => 'index')); ?><br />

</div>
<div class="resources form">
    <?php echo $this->Form->create('Resource'); ?>
    <fieldset>
        <legend><?php echo __('Edit Resource'); ?></legend>
        <?php
        if ($current_user['isSuperAdmin']) echo $this->Form->input('organization_id');
        echo $this->Form->input('resource_name', array('label' => $customLabels['Resource Name']));
        echo $this->Form->input('resource_type_id', array('label' => $customLabels['Resource Type']));
        echo $this->Form->input('description', array('label' => $customLabels['Description']));
        echo $this->Form->input('inventory', array('label' => $customLabels['Inventory']));
        echo $this->Form->input('street_address', array('label' => $customLabels['Street Address']));
        ?>
        <table>
            <tr>
                <td>
                    <?php echo $this->Form->input('city', array('label' => $customLabels['City'])); ?>
                </td>
                <td>
                    <?php
                    echo $this->Form->input('state', array('type' => 'select', 'label' => $customLabels['State'], 'empty' => true, 'options' => array(
                            'Alabama' => 'Alabama', 'Alaska' => 'Alaska', 'Arizona' => 'Arizona', 'Arkansas' => 'Arkansas', 'California' => 'California',
                            'Colorado' => 'Colorado', 'Connecticut' => 'Connecticut', 'Delaware' => 'Delaware', 'Washington DC' => 'Washington DC', 'Florida' => 'Florida',
                            'Georgia' => 'Georgia', 'Hawaii' => 'Hawaii', 'Idaho' => 'Idaho', 'Illinois' => 'Illinois', 'Indiana' => 'Indiana',
                            'Iowa' => 'Iowa', 'Kansas' => 'Kansas', 'Kentucky' => 'Kentucky', 'Louisiana' => 'Louisiana', 'Maine' => 'Maine',
                            'Maryland' => 'Maryland', 'Massachusetts' => 'Massachusetts', 'Michigan' => 'Michigan', 'Minnesota' => 'Minnesota', 'Mississippi' => 'Mississippi',
                            'Missouri' => 'Missouri', 'Montana' => 'Montana', 'Nebraska' => 'Nebraska', 'Nevada' => 'Nevada', 'New Hampshire' => 'New Hampshire',
                            'New Jersey' => 'New Jersey', 'New Mexico' => 'New Mexico', 'New York' => 'New York', 'North Carolina' => 'North Carolina', 'North Dakota' => 'North Dakota',
                            'Ohio' => 'Ohio', 'Oklahoma' => 'Oklahoma', 'Oregon' => 'Oregon', 'Pennsylvania' => 'Pennsylvania', 'Rhode Island' => 'Rhode Island',
                            'South Carolina' => 'South Carolina', 'South Dakota' => 'South Dakota', 'Tennessee' => 'Tennessee', 'Texas' => 'Texas', 'Utah' => 'Utah', 'Vermont' => 'Vermont',
                            'Virginia' => 'VA', 'Washington' => 'Washington', 'West Virginia' => 'West Virginia', 'Wisconsin' => 'Wisconsin', 'Wyoming' => 'Wyoming',
                            'Puerto Rico' => 'Puerto Rico', 'Other' => 'Other'
                            )));
                    ?>
                </td>
                <td>
                    <?php echo $this->Form->input('zip', array('label' => $customLabels['Zip'])); ?>
                </td>
            </tr>
        </table>
        <br /><br />
            <h3><?php echo $current_user['Organization']['org_name'] . "'s Fields"; ?></h3>
            <?php if (empty($customFields)): echo "None"; ?>
                <?php endif; ?>
            <?php foreach ($customFields as $customField): ?>
                <?php echo $this->Form->input($customField['Field']['field_name'], array('type' => $customField['Field']['field_type'], 'value' => $customField['FieldInstance'][0]['field_value'])); ?>
            <?php endforeach; ?>

        <?php echo $this->Form->input('lat', array('type' => 'hidden')); ?>
        <?php echo $this->Form->input('lng', array('type' => 'hidden')); ?>
    </fieldset>
    <div>
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

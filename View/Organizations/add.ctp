<?php echo $this->Html->script('https://maps-api-ssl.google.com/maps/api/js?key=AIzaSyC22n51FklMDzv3wwoc7kH4nxKO0fo2wTI&sensor=true', false); ?>
<?php echo $this->Html->script('geocode.js', false); ?>
<?php echo $this->Html->script('Organizations/geocode_address.js', false); ?>

<style type="text/css">
    form label { 
        width: 7em; 
        float: left;
        padding: 0px;
    }
</style>


<div class="actionsNoButton">

        <?php echo $this->Html->link(__('Organization Listing'), array('action' => 'index')); ?><br />
    
</div>
<div class="organizations form">
    <?php echo $this->Form->create('Organization'); ?>
    <fieldset>
        <legend><?php echo __('Add Organization'); ?></legend>
        <table>
            <tr>
                <td>
                    <?php echo $this->Form->input('org_name'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('address_one'); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('address_two'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('city'); ?>
                </td>
                <td>
                        <?php
                        echo $this->Form->input('state', array('type' => 'select', 'empty' => true, 'options' => array(
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
            </tr>
            <tr>
            	<td colspan="2">
                    <?php echo $this->Form->input('zip', array('type' => 'text')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('contact'); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('website'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('phone', array('type' => 'text')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('phone_cell', array('type' => 'text')); ?>
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                    <?php echo $this->Form->input('phone_office', array('type' => 'text')); ?>
                </td>
            </tr>
        </table>
        <?php echo $this->Form->input('lat', array('type' => 'hidden')); ?>
        <?php echo $this->Form->input('lng', array('type' => 'hidden')); ?>
    </fieldset>
    <div>
        <?php echo $this->Form->submit(__('Save and Add a Resource for this Organization'), array('name' => 'addMore', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

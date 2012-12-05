<?php echo $this->Html->script("client_add.js", FALSE); ?>
<?php echo $this->Html->script("ageDobAuto.js", FALSE); ?>

<style type="text/css">
    select {
        margin-left: 5px;
        vertical-align: baseline;
    }

    h1 {
        font-size: 18px;
    }
</style>
<div class="actionsNoButton clients smaller">
    <?php echo $this->Html->link(__('Search Clients'), array('action' => 'index')); ?><Br />
    <?php echo $this->Html->link(__('Add a Client'), array('action' => 'add'), array('class' => 'active_link')); ?><br />
</div>
<div class="clients form">

    <?php echo $this->Form->create('Client'); ?>
    <div id="accordion">
        <h2>Personal Information</h2>
        <div class="white-background black-text">
            <table>
                <tr>
                    <td>
                        <?php echo $this->Form->input('first_name', array('label' => $customLabels['First Name'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('last_name', array('label' => $customLabels['Last Name'])); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" id="sex">
                    	<?php if( isset($this->validationErrors['Client']['sex']) ): ?>
                    		<div class="input radio error">
                    	<?php else: ?>
                    		<div class="input radio">
                    	<?php endif; ?>
                    		<span class="sex"><?php echo $customLabels['Sex']; ?><span class="asteriks">*</span></span>
                        	<?php
                            	$options = array('M' => 'Male', 'F' => 'Female');
                            	$attributes = array('legend' => false);
                            	echo $this->Form->radio('sex', $options, $attributes);
                        	?>
                        	<?php if( isset($this->validationErrors['Client']['sex']) ): ?>
                        		<div class="error-message"><?php echo $this->validationErrors['Client']['sex'][0]; ?></div>
                        	<?php endif; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    	<?php if( isset($this->validationErrors['Client']['DOB']) ): ?>
                    		<div class="input required error">
                    	<?php else: ?>
                    		<div class="input required">
                    	<?php endif; ?>
	                        <?php echo $this->Form->input('DOB', array(
	                            'type' => 'date',
	                            'onChange' => "updateAge('Client')",
	                            'minYear' => date('Y') - 120,
	                            'maxYear' => date('Y'),
	                            'empty' => true,
	                            'div' => false,
	                        	'error' => false,
	                            'separator' => false,
	                            'label' => $customLabels['DOB']
	                            )); ?>
	                        &nbsp; &nbsp;<strong>OR</strong> &nbsp; &nbsp;
                        	<?php echo $this->Form->input('age', array('label' => $customLabels['Age'], 'div' => false,'onChange' => "updateDOB('Client')")); ?>
                        	<?php if( isset($this->validationErrors['Client']['DOB']) ): ?>
                        		<div class="error-message"><?php echo $this->validationErrors['Client']['DOB'][0]; ?></div>
                        	<?php endif; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->Form->input('address_one', array('label' => $customLabels['Address'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('apartment_number', array('label' => $customLabels['Apt #'], 'type' => 'text')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->Form->input('city', array('label' => $customLabels['City'])); ?>
                    </td>
                    <td>
                        <?php
                        echo $this->Form->input('state', array('label' => $customLabels['State'], 'type' => 'select', 'empty' => true, 'options' => array(
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
                        <?php echo $this->Form->input('zip', array('label' => $customLabels['Zip'], 'type' => 'text')); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php echo $this->Form->input('phone', array('label' => $customLabels['Phone'], 'type' => 'text')); ?>
                    </td>
                </tr>
            </table>
        </div>

        <h2>Source of Income</h2>
        <div class="white-background black-text change-width">
            <table>
                <tr>
                    <td>
                        <?php echo $this->Form->input('regular_job', array('label' => $customLabels['Regular Job'], 'value' => '$0.00')); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('food_stamps', array('label' => $customLabels['Food Stamps'], 'value' => '$0.00')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->Form->input('veterans_pension', array('label' => $customLabels['Veterans Pension'], 'value' => '$0.00')); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('part_time_job', array('label' => $customLabels['Part Time Job'], 'value' => '$0.00')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->Form->input('social_security', array('label' => $customLabels['Social Security'], 'value' => '$0.00')); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('annuity_check', array('label' => $customLabels['Annuity Check'], 'value' => '$0.00')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->Form->input('child_support', array('label' => $customLabels['Child Support'], 'value' => '$0.00')); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('ssi_or_disability', array('label' => $customLabels['SSI Or Disability'], 'value' => '$0.00')); ?> 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php echo $this->Form->input('unemployment', array('label' => $customLabels['Unemployment'], 'value' => '$0.00')); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php echo $this->Form->input('when_next_check', array(
                            'type' => 'date',
                            'empty' => true,
                            'separator' => false,
                            'minYear' => date('Y'),
                            'maxYear' => date('Y') + 5,
                            'label' => $customLabels['When Next Check'], 
                            )); ?>    
                    </td>
                </tr>
            </table>

        </div>

        <h2>Other Information</h2>
        <div class="white-background black-text">
            <table>
                <tr>
                    <td>
                        <?php echo $this->Form->input('pregnant', array('label' => $customLabels['Pregnant'])); ?> 
                    </td>
                    <td>
                        <?php echo $this->Form->input('disabled', array('label' => $customLabels['Disabled'])); ?>  
                    </td>
                    <td>
                        <?php echo $this->Form->input('handicapped', array('label' => $customLabels['Handicapped'])); ?> 
                    </td>
                    <td>
                        <?php echo $this->Form->input('stove', array('label' => $customLabels['Stove'])); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->Form->input('refrigerator', array('label' => $customLabels['Refrigerator'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('cell', array('label' => $customLabels['Cell'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('cable', array('label' => $customLabels['Cable'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('internet', array('label' => $customLabels['Internet'])); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->Form->input("acceptedChrist", array('label' => $customLabels['Accepted Christ'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input("dedicatedChrist", array('label' => $customLabels['Dedicated Christ'])); ?>
                    </td>
                </tr>
            </table>
            <?php echo $this->Form->input('model', array('label' => $customLabels['Model of Car'])); ?>

            <?php
            echo $this->Form->input('how_did_you_hear', array('label' => $customLabels['How Did You Hear About Us?']));
            echo $this->Form->input('how_long_do_you_need', array('label' => $customLabels['How Long Do You Need?']));
            ?>
        </div>
            
            <?php /***************** CUSTOM FIELDS **************************/ ?>
            <h2><?php echo $current_user['Organization']['org_name'] . "'s Fields"; ?></h2>
            <div class="white-background black-text">
                <?php if (empty($customFields)): echo "None"; ?>
                <?php endif; ?>
                <?php foreach ($customFields as $customField): ?>
                    <?php echo $this->Form->input($customField['Field']['field_name'], array('type' => $customField['Field']['field_type'])); ?>
                <?php endforeach; ?>
            </div>
    </div>
    <br /><br />

    <div>
        <?php echo $this->Form->submit(__('Save and Add Client Relatives'), array('name' => 'addMore', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

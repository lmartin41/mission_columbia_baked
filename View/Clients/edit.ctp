<?php echo $this->Html->script("client_add.js", FALSE); ?>
<?php echo $this->Html->script("ageDobAuto.js", FALSE); ?>

<style type="text/css">
    form label { 
        width: 9em; 
        float: left;
        padding: 0px;
    }

    select {
        margin-left: 20px;
    }

    h1 {
        font-size: 18px;
    }

</style>

<div class="clients form">
    <?php echo $this->Form->create('Client'); ?>
    <div id="accordion">
	    <h2>Personal Information</h2>
	    <div class="white-background black-text">
	        <table>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('first_name'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('last_name'); ?>
	                </td>
	            </tr>
	            <tr>
	            	<td colspan="2">
	                	<fieldset>
	                		<legend class="sex">Sex<span class="asteriks">*</span></legend>
		                    <?php
		                    $options = array('M' => 'Male', 'F' => 'Female');
		                    $attributes = array('legend' => false);
		                    echo $this->Form->radio('sex', $options, $attributes);
		                    ?>
	                    </fieldset>
	            	</td>
	            </tr>
	            <tr>
	                <td>

	                	<?php echo $this->Form->input('DOB', array('type' => 'date', 'onChange' => 'updateAge()', 'minYear' => date('Y') - 120, 'maxYear' => date('Y'), 'empty' => true, 'div' => false, 'separator' => false)); ?>

	                	&nbsp; &nbsp;<b>OR</b>

	                </td>
	                <td>
	                   <?php echo $this->Form->input('age', array('onChange' => 'updateDOB()')); ?>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('address_one', array('label' => 'Address')); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('apartment_number', array('label' => 'Apt #', 'type' => 'text')); ?>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('city'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('state', array('type' => 'select', 'empty' => true, 'options' => array(
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
                            ))); ?>
	                </td>
	            </tr>
	            <tr>
	            	<td colspan="2">
	                    <?php echo $this->Form->input('zip', array('type' => 'text')); ?>
	                </td>
	            </tr>
	            <tr>
	                <td colspan="2">
	                    <?php echo $this->Form->input('phone', array('type' => 'text')); ?>
	                </td>
	            </tr>
	        </table>
	    </div>

	    <h2>Source of Income</h2>
	    <div class="white-background black-text change-width">
	        <table>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('regular_job'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('food_stamps'); ?>
	                </td>
	            </tr>
	            <tr>
	            	<td>
	                    <?php echo $this->Form->input('veterans_pension'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('part_time_job'); ?>
	                </td>
	            </tr>
	      		<tr>
	                <td>
	                    <?php echo $this->Form->input('social_security'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('annuity_check'); ?>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('child_support'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('ssi_or_disability', array('label' => 'SSI or Disability')); ?> 
	                </td>
	            </tr>
	            <tr>
	            	<td colspan="2">
	                    <?php echo $this->Form->input('unemployment'); ?>
	                </td>
	            </tr>
	            <tr>
	                <td colspan="2">
	                    <?php echo $this->Form->input('when_next_check', array('type' => 'date', 'empty' => true, 'separator' => false)); ?>    
	                </td>
	            </tr>
	        </table>
	
	    </div>

	    <h2>Other Information</h2>
	    <div class="white-background black-text">
	        <table>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('pregnant'); ?> 
	                </td>
	                <td>
	                    <?php echo $this->Form->input('disabled'); ?>  
	                </td>
	                <td>
	                    <?php echo $this->Form->input('handicapped'); ?> 
	                </td>
	                <td>
	                    <?php echo $this->Form->input('stove'); ?>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('refrigerator'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('cell'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('cable'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('internet'); ?>
	                </td>
	            </tr>
	        </table>
	        <?php echo $this->Form->input('model', array('label' => 'Model of Car')); ?>
	
	        <?php
	        echo $this->Form->input('how_did_you_hear', array('label' => 'How did you hear about us?'));
	        echo $this->Form->input('how_long_do_you_need', array('label' => 'How long do you need?'));
	        ?>
	    </div>
	</div>
    <br /><br />

    <div>
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="actionsNoButton" style="">
	<?php echo $this->Html->link(__('Search Clients'), array('action' => 'index')); ?><Br />
	<?php echo $this->Html->link(__('Edit Client'), array('action' => 'edit'), array('class' => 'active_link')); ?><br />
    <?php echo $this->Html->link(__('Browse Clients'), array('action' => 'browse')); ?>
</div>

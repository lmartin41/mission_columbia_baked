<?php echo $this->Html->script("client_add.js", FALSE); ?>

<?php echo $this->Upload->edit('Client', $clientID); ?>

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
	                <td>
	                    <?php echo $this->Form->input('DOB', array('type' => 'date', 'empty' => true, 'div' => false, 'separator' => false)); ?>
	                    &nbsp; &nbsp;<b>OR</b>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('age'); ?>
	                </td>
	                <td>
	                    <?php
	                    $options = array('M' => 'Male', 'F' => 'Female');
	                    $attributes = array('legend' => false);
	                    echo $this->Form->radio('sex', $options, $attributes);
	                    ?>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('address'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('apartment_number'); ?>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('city'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('state'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('zip'); ?>
	                </td>
	
	            </tr>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('phone'); ?>
	                </td>
	            </tr>
	        </table>
	    </div>

	    <h2>Source of Income</h2>
	    <div class="white-backgorund black-text">
	        <table>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('regular_job'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('food_stamps'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('veterans_pension'); ?>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('part_time_job'); ?>
	                </td>
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
	                    <?php echo $this->Form->input('ssi_or_disability'); ?> 
	                </td>
	                <td>
	                    <?php echo $this->Form->input('unemployment'); ?>
	                </td>
	            </tr>
	            <tr>
	                <td>
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
	        <?php echo $this->Form->input('model'); ?>
	
	        <?php
	        echo $this->Form->input('how_did_you_hear');
	        echo $this->Form->input('how_long_do_you_need');
	        ?>
	    </div>
	</div>
    <br /><br />

    <div>
        <?php echo $this->Form->submit(__('Save and Edit Client Relatives'), array('name' => 'addMore', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="actionsNoButton" style="">

        <?php echo $this->Html->link('Clients Listing', array('action' => 'browse')); ?><br /><br />
        <?php echo $this->Html->link('Upload Photo', array('controller' => 'users', 'action' => 'upload')); ?><br /><br />
        <?php echo $this->Html->link('Search for a Client', array('action' => 'index')); ?>
   
</div>

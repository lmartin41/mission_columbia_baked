<?php echo $this->Html->script("client_add.js", FALSE); ?>

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
<div id="tips" class="tipsBox" style="width:15%;position:absolute;right:5%;top:5%;background:#B4CFEC;border: 1px solid #000000;padding: 10 10 10 10">
    <div class="tipsContent">
        <B>Tips</B>
        <br><br>
        <p>Add Client Tip</p>
    </div>
</div>

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
	            </tr>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('address'); ?>
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
	                    <?php echo $this->Form->input('apartment_number'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('city'); ?>
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('state'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('zip', array('type' => 'text')); ?>
	                </td>
	
	            </tr>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('phone', array('type' => 'text')); ?>
	                </td>
	            </tr>
	        </table>
    	</div>
		<h2>Source of Income</h2>
	    <div class="white-background black-text">
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
	                    <?php echo $this->Form->input('ssi_or_disability'); ?> 
	                </td>
	            </tr>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('unemployment'); ?>
	                </td>
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
	
	            </tr>
	            <tr>
	                <td>
	                    <?php echo $this->Form->input('stove'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('refrigerator'); ?>
	                </td>
	                <td>
	                    <?php echo $this->Form->input('cell'); ?>
	                </td>
	
	            </tr>
	            <tr>
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
        <?php echo $this->Form->submit(__('Save and Add Client Relatives'), array('name' => 'addMore', 'div' => false)); ?>
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

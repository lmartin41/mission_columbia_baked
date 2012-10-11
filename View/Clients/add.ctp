<div class="clients form">
    <?php echo $this->Form->create('Client'); ?>
    <fieldset>
        <legend><?php echo __('Add Client'); ?></legend>
        <?php
        echo $this->Form->input('first_name');
        echo $this->Form->input('last_name');
        echo $this->Form->input('DOB', array('type' => 'date'));
        echo $this->Form->input('sex');
        echo $this->Form->input('SSN');
        echo $this->Form->input('address_one');
        echo $this->Form->input('address_two');
        echo $this->Form->input('city');
        echo $this->Form->input('state');
        echo $this->Form->input('zip');
        echo $this->Form->input('phone');
        echo $this->Form->input('apartment_number');
        echo $this->Form->input('how_did_you_hear');
        echo $this->Form->input('how_long_do_you_need');
        echo $this->Form->input('regular_job');
        echo $this->Form->input('food_stamps');
        echo $this->Form->input('veterans_pension');
        echo $this->Form->input('part_time_job');
        echo $this->Form->input('social_security');
        echo $this->Form->input('annuity_check');
        echo $this->Form->input('child_support');
        echo $this->Form->input('ssi_or_disability');
        echo $this->Form->input('unemployment');
        echo $this->Form->input('when_next_check');
        echo $this->Form->input('pregnant');
        echo $this->Form->input('disabled');
        echo $this->Form->input('handicapped');
        echo $this->Form->input('stove');
        echo $this->Form->input('refrigerator');
        echo $this->Form->input('cell');
        echo $this->Form->input('cable');
        echo $this->Form->input('internet');
        echo $this->Form->input('model');
        ?>
    </fieldset>
    <div>
        <?php echo $this->Form->submit(__('Save and Add Client Relatives'), array('name' => 'addMore', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Finished!', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

       <li><?php echo $this->Html->link(__('Clients Listing'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Search for a Client'), array('action' => 'search')); ?> </li>
    </ul>
</div>

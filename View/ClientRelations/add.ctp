<?php echo $this->Html->script("client_add.js", FALSE); ?>

<style type="text/css">
    form label { 
        width: 9em; 
        float: left;
        padding: 0px;
    }
</style>

<div class="clientRelations form">
    <?php echo $this->Form->create('ClientRelation'); ?>
    <fieldset>
        <legend><?php echo __('Add Client Relation'); ?></legend>
        <?php
        echo $this->Form->input('first_name');
        echo $this->Form->input('last_name');
        echo $this->Form->input('relationship');
        echo $this->Form->input('DOB', array('type' => 'date', 'minYear' => date('Y') - 120, 'maxYear' => date('Y') - 1));
        echo "(If you don't know, please enter age)";
        echo $this->Form->input('Age', array('style' => 'width:50px'));
        ?>
        <fieldset>
            <legend class = "sex">Sex<span class = "asteriks">*</span></legend>
            <?php
            $options = array('M' => 'Male', 'F' => 'Female');
            $attributes = array('legend' => false);
            echo $this->Form->radio('sex', $options, $attributes);
            ?>
        </fieldset>
    </fieldset>
    <div>
        <?php echo $this->Form->submit('Add another relative', array('name' => 'Add_another_relative', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
<?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="actionsNoButton">

    <?php echo $this->Html->link(__('Clients Listing'), array('controller' => 'clients', 'action' => 'index')); ?><br /><br />
<?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'search')); ?> 

</div>

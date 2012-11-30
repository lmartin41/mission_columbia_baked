<style type="text/css">
    form label { 
        width: 10em; 
        float: left;
        padding: 0px;
    }
</style>

<div class="actionsNoButton">

    <?php echo $this->Html->link(__('Custom Labels Listing'), array('action' => 'index')); ?><br />

</div>

<script type="text/javascript">
    
</script>

<div class="lookups form">
    <?php echo $this->Form->create('Lookup'); ?>
    <fieldset>
        <legend><?php echo __('Add Custom Label'); ?></legend>
        <?php
        echo $this->Form->input('table_reference', array('type' => 'select', 'onChange' => 'updateSelect', 'options' => array('Clients' => 'Clients', 'Resources' => 'Resources')));
        echo $this->Form->input('field_name', array('type' => 'select', 'options' => array(
                'First Name' => 'First Name', 'Last Name' => 'Last Name', 'Sex' => 'sex',
                'DOB' => 'DOB', 'Age' => 'Age', 'Address' => 'Address', 'Apt #' => 'Apt #',
                'City' => 'City', 'State' => 'State', 'Zip' => 'Zip', 'Phone' => 'Phone',
                'Regular Job' => 'Regular Job', 'Food Stamps' => 'Food Stamps', 'Veterans Pension' => 'Veterans Pension',
                'Part Time Job' => 'Part Time Job', 'Social Security' => 'Social Security', 'Annuity Check' => 'Annuity Check',
                'Child Support' => 'Child Support', 'SSI Or Disability' => 'SSI Or Disability', 'Unemployment' => 'Unemployment',
                'When Next Check' => 'When Next Check', 'Pregnant' => 'Pregnant', 'Disabled' => 'Disabled', 'Handicapped' => 'Handicapped',
                'Stove' => 'Stove', 'Refrigerator' => 'Refrigerator', 'cell' => 'Cell', 'Cable' => 'Cable', 'Internet' => 'Inteernet',
                'Accepted Christ' => 'Accepted Christ', 'Dedicated Christ' => 'Dedicated Christ', 'Model of Car' => 'Model of Car',
                'How did you Hear About Us?' => 'How Did You Hear About Us?', 'How long do you Need?', 'How long do you Need?',
                'Resource Name' => 'Resource Name', 'Resource Type' => 'Resource Type', 'Description' => 'Description',
                'Inventory' => 'Inventory', 'Resource Status' => 'Resource Status', 'Street Address' => 'Street Address',
                'City' => 'Resource City', 'State' => 'Resource State', 'Zip' => 'Resource Zip'
                )));
        echo $this->Form->input('custom_name');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>


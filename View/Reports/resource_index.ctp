<?php echo $this->Html->script("toggle.js", FALSE); ?>
<?php echo $this->Html->script("datepickr.js", FALSE); ?>
<?php echo $this->Html->css("datepickr.css", FALSE); ?>
<?php $this->Html->script('resource_uses_add', FALSE); ?>

<?php include("reportsDiv.ctp"); ?>

<div class="resourceuses form">

    <h3>Individual Resource Report</h3>
    <?php
    echo $this->Form->create('ResourceUs');
    echo $this->Form->input('organization_id', array('label' => 'Organization:', 'id' => 'organization', 'empty' => 'Select an organization'));
    echo $this->Form->input('resource_id', array('type' => 'select', 'label' => 'Resource:', 'disabled' => 'disabled'));
    ?>

    <?php $oldDate = Date('Y') . "-01-01"; ?>
    <?php $newDate = Date('Y-m-d'); ?>
    From:<input name="startDate" id="datepickResource3" default="test" class="date-pick" style="width: 100px;" value = '<?php echo $oldDate; ?>' />
    &nbsp;
    To:<input name="endDate" id="datepickResource4" class="date-pick" style="width: 100px;" value ="<?php echo $newDate; ?>" />

    <script type="text/javascript">
        new datepickr('datepickResource3', { dateFormat: 'Y-m-d' });
        new datepickr('datepickResource4', { dateFormat: 'Y-m-d' });
    </script>
    
    <br /><br /><br />
    Search Weekly, Monthly or Annually:<br />
        <fieldset>
            <input type="radio" name="weekMonthChooser" value="weekly" style="vertical-align: middle" />Weekly<br /><br />
            <input type="radio" name="weekMonthChooser" value="monthly" style="vertical-align: middle" />Monthly<br /><br />
            <input type="radio" name="weekMonthChooser" value="annually" style="vertical-align: middle" />Annually<br /><br />
        </fieldset>
    
    <?php
    echo $this->Form->end("Retrieve Resource Report", array('name' => 'resource'));
    ?> 
    <br />
</div>

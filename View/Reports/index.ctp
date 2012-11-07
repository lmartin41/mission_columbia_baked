<?php echo $this->Html->script("toggle.js", FALSE); ?>
<?php echo $this->Html->script("datepickr.js", FALSE); ?>
<?php echo $this->Html->css("datepickr.css", FALSE); ?>

<?php include("reportsDiv.ctp"); ?>

<div class="Reports form">

    <?php $oldDate = Date('Y') . "-01-01"; ?>
    <?php $newDate = Date('Y-m-d'); ?>

    <h3>Individual Client Report</h3>

    <?php
    echo $this->Form->create('Client');
    echo $this->Form->input("Name");
    ?>

    <div id="datePickerFields" style="margin-left:auto; margin-left:auto;">
        From:<input name="startDate" id="datepickClient" default="test" class="date-pick" style="width: 100px;" value = '<?php echo $oldDate; ?>' />
        &nbsp;
        To:<input name="endDate" id="datepickClient2" class="date-pick" style="width: 100px;" value ="<?php echo $newDate; ?>" />
    </div>
    <script type="text/javascript">
        new datepickr('datepickClient', { dateFormat: 'Y-m-d' });
        new datepickr('datepickClient2', { dateFormat: 'Y-m-d' });
    </script>
    <?php
    echo $this->Form->end("Retrieve Client Report", array('name' => 'client'));
    ?> 
    <br />
</div>

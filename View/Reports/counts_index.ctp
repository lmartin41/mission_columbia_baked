<?php echo $this->Html->script("toggle.js", FALSE); ?>
<?php echo $this->Html->script("datepickr.js", FALSE); ?>
<?php echo $this->Html->css("datepickr.css", FALSE); ?>

<?php include("reportsDiv.ctp"); ?>

<div class="Reports form">

    <h3>Counts</h3><br />
    <?php $oldDate = Date('Y') . "-01-01"; ?>
    <?php $newDate = Date('Y-m-d'); ?>

    <form name="aggregateClient" method="post">

        Date:<input name="startDate" id="datepickAggClient" default="test" class="date-pick" style="width: 100px;" value = '<?php echo $oldDate; ?>' />
        &nbsp;
        To:<input name="endDate" id="datepickClient2" class="date-pick" style="width: 100px;" value ="<?php echo $newDate; ?>" />
        <br /><br /><br />

        <script type="text/javascript">
            new datepickr('datepickAggClient', { dateFormat: 'Y-m-d' });
            new datepickr('datepickClient2', { dateFormat: 'Y-m-d' });
        </script>

        Search Weekly or Monthly:<br />
        <fieldset>
            <input type="radio" name="weekMonthChooser" value="weekly" style="vertical-align: middle" />Weekly<br /><br />
            <input type="radio" name="weekMonthChooser" value="monthly" style="vertical-align: middle" />Monthly<br /><br />
        </fieldset>

        <input type="submit" value="Retrieve Report"/>
    </form>

</div>


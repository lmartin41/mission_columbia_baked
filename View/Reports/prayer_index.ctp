<?php echo $this->Html->script("toggle.js", FALSE); ?>
<?php echo $this->Html->script("datepickr.js", FALSE); ?>
<?php echo $this->Html->css("datepickr.css", FALSE); ?>

<?php include("reportsDiv.ctp"); ?>

<div class="Reports form">

    <h3>Prayer Journal</h3><br />
        <?php $startDate = Date('Y') . "-01-01"; ?>
        <?php $endDate = Date('Y-m-d'); ?>

    <form name="aggregateClient" method="post">

        Date:<input name="startDate" id="datepickAggClient" default="test" class="date-pick" style="width: 100px;" value = '<?php echo $startDate; ?>' />
        &nbsp;
        To:<input name="endDate" id="datepickClient2" class="date-pick" style="width: 100px;" value ="<?php echo $endDate; ?>" />
        <br /><br /><br />

        <script type="text/javascript">
            new datepickr('datepickAggClient', { dateFormat: 'Y-m-d' });
            new datepickr('datepickClient2', { dateFormat: 'Y-m-d' });
        </script>

        <input type="submit" value="Retrieve Report"/>
    </form>

</div>



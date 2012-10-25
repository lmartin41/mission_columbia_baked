<?php echo $this->Html->script("toggle.js", FALSE); ?>
<?php echo $this->Html->script("datepickr.js", FALSE); ?>
<?php echo $this->Html->css("datepickr.css", FALSE); ?>

<div class="Reports form">

    <h3>Aggregate Client Report</h3><br />
    <?php $oldDate = Date('Y') . "-1-1"; ?>
    <?php $newDate = Date('Y-m-d'); ?>
    
    <form>
    From:<input name="startDate" id="datepickAggClient" default="test" class="date-pick" style="width: 100px;" value = '<?php echo $oldDate; ?>' />
    &nbsp;
    To:<input name="endDate" id="datepickAggClient2" class="date-pick" style="width: 100px;" value ="<?php echo $newDate; ?>" />
    <br /><br />

    <fieldset>
        <input type="radio" name="weekly" value="weekly">Search Weekly<br>
        <input type="radio" name="monthly" value="monthly">Search Monthly
    </fieldset>

    <script type="text/javascript">
        new datepickr('datepickAggClient', { dateFormat: 'Y-m-d' });
        new datepickr('datepickAggClient2', { dateFormat: 'Y-m-d' });
    </script>
<br /><br />
    <?php
    echo $this->Form->end("Retrieve Aggregate Client Report", array('name' => 'client'));
    ?> 
</div>

<div class="actionsNoButton">
    <?php echo $this->Html->link(__('Individual Reports'), array()); ?><br /><br />
    <ul>
        <li><?php echo $this->Html->link(__('Clients'), array('action' => 'index')); ?></li><br />
        <li><?php echo $this->Html->link(__('Resources'), array('action' => 'resourceIndex')); ?></li><br />
    </ul>
    <?php echo $this->Html->link(__('Aggregate Reports'), array()); ?><br /><br />
    <ul>
        <li><?php echo $this->Html->link('Clients', array('action' => 'aggregateClientsIndex')); ?></li><br />
        <li><?php echo $this->Html->link('Resources', array('action' => 'aggregateResourcesIndex')); ?></li>
    </ul>
    <br />
    <?php echo $this->Html->link('Client Listing', array('controller' => 'clients', 'action' => 'browse')); ?>

</div>

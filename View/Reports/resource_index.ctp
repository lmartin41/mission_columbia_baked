<?php echo $this->Html->script("toggle.js", FALSE); ?>
<?php echo $this->Html->script("datepickr.js", FALSE); ?>
<?php echo $this->Html->css("datepickr.css", FALSE); ?>

<div class="Reports form">

    <h3>Individual Resource Report</h3>
    <?php
    echo $this->Form->create('Resource');
    echo $this->Form->input("resource_name");
    ?>

    <?php $oldDate = Date('Y') . "-1-1"; ?>
    <?php $newDate = Date('Y-m-d'); ?>
    From:<input name="startDate" id="datepickResource3" default="test" class="date-pick" style="width: 100px;" value = '<?php echo $oldDate; ?>' />
    &nbsp;
    To:<input name="endDate" id="datepickResource4" class="date-pick" style="width: 100px;" value ="<?php echo $newDate; ?>" />

    <script type="text/javascript">
        new datepickr('datepickResource3', { dateFormat: 'Y-m-d' });
        new datepickr('datepickResource4', { dateFormat: 'Y-m-d' });
    </script>
    <br /><br />
    <?php
    echo $this->Form->end("Retrieve Resource Report", array('name' => 'resource'));
    ?> 
    <br />
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
    <?php echo $this->Html->link('Resource Listing', array('controller' => 'resources', 'action' => 'index')); ?>
</div>
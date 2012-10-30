<?php echo $this->Html->script("toggle.js", FALSE); ?>
<?php echo $this->Html->script("datepickr.js", FALSE); ?>
<?php echo $this->Html->css("datepickr.css", FALSE); ?>

<div class="Reports form">

    <h3>Aggregate Client Report</h3><br />
    <?php $oldDate = Date('Y') . "-01-01"; ?>

    <form name="aggregateClient" method="post">

        Date:<input name="startDate" id="datepickAggClient" default="test" class="date-pick" style="width: 100px;" value = '<?php echo $oldDate; ?>' />
        &nbsp;
        <br /><br /><br />

        <script type="text/javascript">
            new datepickr('datepickAggClient', { dateFormat: 'Y-m-d' });
        </script>

        Search Weekly or Monthly:<br />
        <fieldset>
            <input type="radio" name="weekMonthChooser" value="weekly" style="vertical-align: middle" />Weekly<br /><br />
            <input type="radio" name="weekMonthChooser" value="monthly" style="vertical-align: middle" />Monthly<br /><br />
        </fieldset>

        Search by the following Criteria:<br />

        <fieldset>
            <input type="radio" name="sexChooser" value="male" style="vertical-align: middle" />Men<br /><br />
            <input type="radio" name="sexChooser" value="female" style="vertical-align: middle" />Women<br /><br />
            <input type="radio" name="sexChooser" value="neither" style="vertical-align: middle" />Both<br /><br />
        </fieldset>


        <input type="submit" value="Retrieve Aggregate Client Report"/>
    </form>

</div>

<div class="actionsNoButton">
    <?php echo $this->Html->link(__('Individual Reports'), array()); ?><br />
    <ul>
        <li><?php echo $this->Html->link(__('Clients'), array('action' => 'index')); ?></li><br />
        <li><?php echo $this->Html->link(__('Resources'), array('action' => 'resourceIndex')); ?></li><br />
    </ul>
    <?php echo $this->Html->link(__('Aggregate Reports'), array()); ?><br />
    <ul>
        <li><?php echo $this->Html->link('Clients', array('action' => 'aggregateClientsIndex')); ?></li><br />
        <li><?php echo $this->Html->link('Resources', array('action' => 'aggregateResourcesIndex')); ?></li>
    </ul>
    <br />
    <?php echo $this->Html->link('Client Listing', array('controller' => 'clients', 'action' => 'browse')); ?>

</div>

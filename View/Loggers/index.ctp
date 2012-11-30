<?php echo $this->Html->script("datepickr.js", FALSE); ?>
<?php echo $this->Html->css("datepickr.css", FALSE); ?>

<div class="actionsNoButton">
    <?php echo $this->Html->link(__('Individual Reports'), array()); ?><br />
    <ul>
        <li><?php echo $this->Html->link(__('Clients'), array('controller' => 'reports', 'action' => 'index')); ?></li><br />
        <li><?php echo $this->Html->link(__('Resources'), array('controller' => 'reports', 'action' => 'resourceIndex')); ?></li><br />
    </ul>
    <?php echo $this->Html->link(__('Aggregate Reports'), array()); ?><br />
    <ul>
        <li><?php echo $this->Html->link('Counts', array('controller' => 'reports', 'action' => 'countsIndex')); ?></li><br />
        <li><?php echo $this->Html->link('Logs', array('controller' => 'loggers', 'action' => 'index')); ?></li>
    </ul>
    <br />
    <?php if ($isAtleastAdmin) echo $this->Html->link('Prayer Journal', array('controller' => 'reports', 'action' => 'prayerIndex')); ?>

</div>

<div class="loggers index">
    <h3><?php echo __('Logs'); ?></h3>
    <?php $startDate = Date('Y') . "-01-01"; ?>
    <?php $endDate = Date('Y-m-d'); ?>

    <form name="logs" method="post">

        Date:<input name="startDate" id="datepickLogs" default="test" class="date-pick" style="width: 100px;" value = '<?php echo $startDate; ?>' />
        &nbsp;
        To:<input name="endDate" id="datepickLogs2" class="date-pick" style="width: 100px;" value ="<?php echo $endDate; ?>" />
        <br /><br /><br />

        <script type="text/javascript">
            new datepickr('datepickLogs', { dateFormat: 'Y-m-d' });
            new datepickr('datepickLogs2', { dateFormat: 'Y-m-d' });
        </script>

        <input type="submit" value="Retrieve Logs"/>
    </form>
    <br /><br />
</div>


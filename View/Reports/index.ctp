<?php echo $this->Html->script("toggle.js", FALSE); ?>
<?php echo $this->Html->script("datepickr.js", FALSE); ?>
<?php echo $this->Html->css("datepickr.css", FALSE); ?>

<div class="Reports form">

                <h3>Individual Client Report</h3>
                <?php
                echo $this->Form->create('Client');
                echo $this->Form->input("first_name");
                echo $this->Form->input("last_name");
                ?>
                
                <?php $oldDate = Date('Y')."-1-1"; ?>
                <?php $newDate = Date('Y-m-d'); ?>
                From:<input name="startDate" id="datepickClient" default="test" class="date-pick" style="width: 100px;" value = '<?php echo $oldDate; ?>' />
                &nbsp;
                To:<input name="endDate" id="datepickClient2" class="date-pick" style="width: 100px;" value ="<?php echo $newDate; ?>" />

                <script type="text/javascript">
                    new datepickr('datepickClient', { dateFormat: 'm-d-Y' });
                    new datepickr('datepickClient2', { dateFormat: 'm-d-Y' });
                </script>
                <?php
                echo $this->Form->end("Retrieve Client Report", array('name' => 'client'));
                ?> 
                <br />
</div>

<div class="actionsNoButton">
    <?php echo $this->Html->link(__('Individual Reports'), array()); ?><br /><br />
    <ul>
        <li><?php echo $this->Html->link(__('Clients'), array('action' => 'index')); ?></li><br />
        <li><?php echo $this->Html->link(__('Resources'), array('action' => 'resourceReport')); ?></li><br />
    </ul>
    <?php echo $this->Html->link(__('Aggregate Reports'), array()); ?><br /><br />
    <ul>
        <li>Clients</li><br />
        <li>Resources</li>
    </ul>
    <br />
        <?php echo $this->Html->link('Client Listing', array('controller' => 'clients', 'action' => 'browse')); ?>

</div>

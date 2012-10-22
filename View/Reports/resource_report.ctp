<?php echo $this->Html->script("toggle.js", FALSE); ?>
<?php echo $this->Html->script("datepickr.js", FALSE); ?>
<?php echo $this->Html->css("datepickr.css", FALSE); ?>

<div class="Reports form">
    <table style="width: 1000px">
        <tr>
                       <td>
                <h2>Resources</h2>
                <br />
                <h3>Individual Resource Report</h3>
                <?php
                echo $this->Form->create('Resource');
                echo $this->Form->input("resource_name");
                ?>

                From:<input id="datepickResource" class="date-pick" style="width: 100px;"/>
                &nbsp;
                To:<input id="datepickResource2" class="date-pick" style="width: 100px;"/>

                <script type="text/javascript">
                    new datepickr('datepickResource', { dateFormat: 'm-d-Y' });
                    new datepickr('datepickResource2', { dateFormat: 'm-d-Y' });
                </script>
                <br /><br />
                <?php
                echo $this->Form->end("Retrieve Resource Report", array('name' => 'resource'));
                ?> 
                <br />
</td>
<td>

                <h3>Resource Statistics</h3>
                    <br />
                    Number of resources: <?php echo $numResources; ?>
                    <br />
                    Total number of resource uses: <?php echo $numResourceUses; ?>
                    <br />
                    Most popular resource: <?php echo $mostPopular; ?>


                <br /><br />
            </td>
        </tr>
    </table>
</div>
<div class="actionsNoButton">

        <?php echo $this->Html->link(__('Clients Report'), array('action' => 'index')); ?><br /><br />
        <?php echo $this->Html->link(__('Resource Report'), array('action' => 'resourceReport')); ?><br /><br />
<?php echo $this->Html->link('Resource Listing', array('controller' => 'resources', 'action' => 'index')); ?>
    
</div>
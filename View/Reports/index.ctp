<?php echo $this->Html->script("toggle.js", FALSE); ?>
<?php echo $this->Html->script("datepickr.js", FALSE); ?>
<?php echo $this->Html->css("datepickr.css", FALSE); ?>

<div class="Reports form">
    <table style="width: 1000px">
        <tr>
            <td>
                <h2>Clients</h2>
                <br />
                <h3>Individual Client Report</h3>
                <?php
                echo $this->Form->create('Client');
                echo $this->Form->input("first_name");
                echo $this->Form->input("last_name");
                ?>
                From:<input id="datepickClient" class="date-pick" style="width: 100px;"/>
                &nbsp;
                To:<input id="datepickClient2" class="date-pick" style="width: 100px;"/>

                <script type="text/javascript">
                    new datepickr('datepickClient', { dateFormat: 'm-d-Y' });
                    new datepickr('datepickClient2', { dateFormat: 'm-d-Y' });
                </script>
                <?php
                echo $this->Form->end("Retrieve Client Report", array('name' => 'client'));
                ?> 
                <br />
            </td>
            <td>

                <h3>Client Statistics</h3>
                <br />
                Number of clients: <?php echo $numClients; ?>
                <br />
                Average Age of Clients: <?php echo $ageClients; ?>
                <br />
                Number of Men: <?php echo $sexClients[0]; ?>
                <br />
                Number of Women: <?php echo $sexClients[1]; ?>
                <br />
                Average income of Clients: $<?php echo $incomeAvgClients; ?>
                <br />
                Number of Pregnant Clients: <?php echo $statusClients[0]; ?>
                <br />
                Number of Disabled Clients: <?php echo $statusClients[1]; ?>
                <br />
                Number of Handicapped Clients: <?php echo $statusClients[2]; ?>
                <br />
                Number of Clients with Stoves: <?php echo $statusClients[3]; ?>
                <br />
                Number of Clients with Refrigerators: <?php echo $statusClients[4]; ?>
                <br />
                Number of Clients with Cell Phones: <?php echo $statusClients[5]; ?>
                <br />
                Number of Clients with Cable TV: <?php echo $statusClients[6]; ?>
                <br />
                Number of Clients with Internet Access: <?php echo $statusClients[7]; ?>
                <br /><br />

                <br /><br />

            </td>


        </tr>
    </table>
</div>
<div class="actionsNoButton">
    <ul>
        <li><?php echo $this->Html->link(__('Clients Report'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Resource Report'), array('action' => 'resourceReport')); ?></li>
        <li><?php echo $this->Html->link('Client Listing', array('controller' => 'clients', 'action' => 'browse')); ?></li>
    </ul>
</div>

<div class="reports form">

<h2><?php echo "Client Aggregate Report from ".$startDate." to ".$endDate; ?></h2>
<br />     
                Number of Resource Uses: <?php echo $countPeriod; ?>
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
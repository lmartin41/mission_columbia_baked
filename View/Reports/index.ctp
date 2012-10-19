<?php echo $this->Html->script("toggle.js", FALSE); ?>

<table>
    <tr>
        <td>
            <h2>Clients</h2>
            <br />
            <h3>Individual Client Report</h3>
            <?php
            echo $this->Form->create('Client');
            echo $this->Form->input("first_name");
            echo $this->Form->input("last_name");
            echo $this->Form->end("Retrieve Client Report", array('name' => 'client'));
            ?> 
            <br />

            <h3>Client Statistics</h3>
            <a onclick="return toggle('1');">Expand</a>
            <div id ="1" style ="display: none">
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
            <br /><br />
            <?php echo $this->Html->link('Client Listing', array('controller' => 'clients', 'action' => 'browse')); ?>
        </td>
        <td>
            <h2>Organizations</h2>
            <br />
            <h3>Individual Organization Report</h3>
            <?php
            echo $this->Form->create('Organization');
            echo $this->Form->input("org_name");
            echo $this->Form->end("Retrieve Organization Report", array('name' => 'organization'));
            ?> 
            <br /><br /><br /><br />

            <h3>Organization Statistics</h3>
            <a onclick="return toggle('2');">Expand</a>
            <div id ="2" style ="display: none">
                <br />
                Number of Organizations: <?php echo $numOrganizations; ?>
                <br />

            </div>
            <br /><br />
            <?php echo $this->Html->link('Organization Listing', array('controller' => 'organizations', 'action' => 'index')); ?>
            <br />

            <br /><br />
        </td>
        <td>
            <h2>Resources</h2>
            <br />
            <h3>Individual Resource Report</h3>
            <?php
            echo $this->Form->create('Resource');
            echo $this->Form->input("resource_name");
            echo $this->Form->end("Retrieve Resource Report", array('name' => 'resource'));
            ?> 
            <br /><br /><br /><br />

            <h3>Resource Statistics</h3>
            <a onclick="return toggle('3');">Expand</a>
            <div id ="3" style ="display: none">
                <br />
                Number of resources: <?php echo $numResources; ?>
                <br />
                Total number of resource uses: <?php echo $numResourceUses; ?>
                <br />
                Most popular resource: <?php echo $mostPopular; ?>
                <br />

            </div>
            <br /><br />
            <?php echo $this->Html->link('Resource Listing', array('controller' => 'resources', 'action' => 'index')); ?>
            <br />

            <br /><br />
        </td>
    </tr>
</table>

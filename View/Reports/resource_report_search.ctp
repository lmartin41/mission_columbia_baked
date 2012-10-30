<div class="Reports form">
    <h2>Search Results</h2>
    <br />
    <?php
    if ($results == null):
        echo 'No results Found';
        ?>
        <br /><br />

    <?php else: ?>
            
            <table cellpadding="0" cellspacing="0">
            <tr>
                <th>Resource ID</th>
                <th>Resource Name</th>
                <th>Organization Name</th>
                <th></th>

            </tr>
            <?php foreach ($results as $result): ?>
                <tr>
                    <td><?php echo $result['Resource']['id']; ?>&nbsp;</td>
                    <td><?php echo $result['Resource']['resource_name']; ?>&nbsp;</td>
                    <td><?php echo $results['Organization']['org_name']; ?>&nbsp;</td>
                    <td><?php echo $this->Html->link('View Report', array('action' => 'resourceReport', $result['Resource']['id'])); ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

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
        <?php echo $this->Html->link('Resource Listing', array('controller' => 'resources', 'action' => 'index')); ?>

</div>
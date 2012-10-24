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
                <th>Client ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th></th>

            </tr>
            <?php foreach ($results as $result): ?>
                <tr>
                    <td><?php echo $result['Client']['id']; ?>&nbsp;</td>
                    <td><?php echo $result['Client']['first_name']; ?>&nbsp;</td>
                    <td><?php echo $result['Client']['last_name']; ?>&nbsp;</td>
                    <td><?php echo $this->Html->link('View Report', array('action' => 'clientReport', $result['Client']['id'])); ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</div>

<div class="actionsNoButton">
    <?php echo $this->Html->link(__('Individual Reports'), array()); ?><br /><br />
    <ul>
        <li><?php echo $this->Html->link(__('Client Report'), array('action' => 'index')); ?></li><br />
        <li><?php echo $this->Html->link(__('Resource Report'), array('action' => 'resourceReport')); ?></li><br />
    </ul>
    <?php echo $this->Html->link(__('Aggregate Reports'), array()); ?><br /><br />
    <ul>
        <li>Counts</li><br />
    </ul>

    <?php echo $this->Html->link('Client Listing', array('controller' => 'clients', 'action' => 'browse')); ?>

</div>
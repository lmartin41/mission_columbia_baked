<div class="clients form">
    <h2>Search Results</h2>
    <br />
    <?php
    if ($results == null):
        echo 'No results Found';
    ?>

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
                    <td><?php echo $this->Html->link('View Profile', array('action' => 'view', $result['Client']['id'])); ?>

                </tr>
            <?php endforeach; ?>
        </table>

    <?php endif; ?>
    <br /><br /><br />

</div>

<div class="actionsNoButton">
    <?php echo $this->Html->link(__('Search Clients'), array('action' => 'index')); ?>
	<?php echo $this->Html->link(__('Add a Client'), array('action' => 'add')); ?>
    <?php echo $this->Html->link(__('Browse Clients'), array('action' => 'browse')); ?>
</div>
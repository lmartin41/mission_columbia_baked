<?php include("reportsDiv.ctp"); ?>

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
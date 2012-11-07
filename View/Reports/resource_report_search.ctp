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
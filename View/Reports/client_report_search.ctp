<div class="Reports form">
    <h2>Search Results</h2>
    <br />
    <?php
    if ($results == null):
        echo 'No results Found';
        ?>
        <br /><br />

    <?php else: ?>
        <?php foreach ($results as $result): ?>
            <?php
            echo $this->Html->link($result['Client']['first_name'] . ' '
                    . $result['Client']['last_name'] . ' (SEX: ' . $result['Client']['sex'] . ', DOB: '
                    . $result['Client']['DOB'] . ') ', array('action' => 'clientReport', $result['Client']['id']));
            ?>
            <br /><br />
        <?php endforeach; ?>
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
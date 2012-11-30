<div class="actionsNoButton">
    <?php echo $this->Html->link(__('Individual Reports'), array()); ?><br />
    <ul>
        <li><?php echo $this->Html->link(__('Clients'), array('action' => 'index')); ?></li><br />
        <li><?php echo $this->Html->link(__('Resources'), array('action' => 'resourceIndex')); ?></li><br />
    </ul>
    <?php echo $this->Html->link(__('Aggregate Reports'), array()); ?><br />
    <ul>
        <li><?php echo $this->Html->link('Counts', array('action' => 'countsIndex')); ?></li><br />
        <li><?php echo $this->Html->link('Logs', array('controller' => 'loggers', 'action' => 'index')); ?></li>
    </ul>
    <br />
    <?php if ($isAtleastAdmin) echo $this->Html->link('Prayer Journal', array('action' => 'prayerIndex')); ?>
</div>
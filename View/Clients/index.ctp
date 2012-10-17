<div>
    <h2>Client Search</h2>
    <?php
    echo $this->Form->create();
    echo $this->Form->input("first_name");
    echo $this->Form->input("last_name");
    echo $this->Form->end("Search");
    ?> 

    <br /><br />
    <?php echo $this->Html->link(__('Add a client'), array('action' => 'add')); ?>
    &nbsp;
    <?php echo $this->Html->link(__('Browse Clients'), array('action' => 'browse')); ?>
</div>


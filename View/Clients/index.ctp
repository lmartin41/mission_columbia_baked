<div class="clients form">
    <h2>Client Search</h2>
    <?php
    echo $this->Form->create();
    echo $this->Form->input("Name");
    echo $this->Form->end("Search");
    ?> 

</div>
<div class="actionsNoButton">
    
        <?php echo $this->Html->link(__('Add a Client'), array('action' => 'add')); ?><br />
        <?php echo $this->Html->link(__('Browse Clients'), array('action' => 'browse')); ?>
    
</div>


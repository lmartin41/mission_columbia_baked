<div class="clients form">
    <h2>Client Search</h2>
    <?php
    echo $this->Form->create();
    echo $this->Form->input("First Name");
    echo $this->Form->input("Last Name");
    echo $this->Form->end("Search");
    ?> 

</div>
<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('Add a Client'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Browse Clients'), array('action' => 'browse')); ?></li>
    </ul>
</div>


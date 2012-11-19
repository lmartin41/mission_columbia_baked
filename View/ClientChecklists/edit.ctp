<div class="clientChecklists form">
    <?php echo $this->Form->create('ClientChecklist'); ?>
    <fieldset>
        <legend><?php echo __('Edit Client Checklist'); ?></legend>
        <?php
        echo $this->Form->input('checklist_name');
        echo $this->Form->input('checklist_description');
        ?>
    </fieldset>
    <div>
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="actionsNoButton">
    

        <?php echo $this->Html->link(__('Checklists Listing'), array('action' => 'index', $clientID)); ?><br />
        <?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'index')); ?>

    
</div>
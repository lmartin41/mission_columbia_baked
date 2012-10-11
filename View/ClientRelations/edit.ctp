<div class="clientRelations form">
    <?php echo $this->Form->create('ClientRelation'); ?>
    <fieldset>
        <legend><?php echo __('Edit Client Relation'); ?></legend>
        <?php
        echo $this->Form->input('client_id');
        echo $this->Form->input('first_name');
        echo $this->Form->input('last_name');
        echo $this->Form->input('relationship');
        echo $this->Form->input('DOB');
        echo $this->Form->input('sex');
        ?>
    </fieldset>
    <div>
        <?php echo $this->Form->submit('Finished!', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Client Listing'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Relatives Listing'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete This Relative'), array('action' => 'delete', $this->Form->value('ClientRelation.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ClientRelation.id'))); ?></li>
        
    </ul>
</div>

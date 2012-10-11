<div class="clientRelations form">
    <?php echo $this->Form->create('ClientRelation'); ?>
    <fieldset>
        <legend><?php echo __('Add Client Relation'); ?></legend>
        <?php
        echo $this->Form->input('first_name');
        echo $this->Form->input('last_name');
        echo $this->Form->input('relationship');
        echo $this->Form->input('DOB', array('type' => 'date'));
        echo "(If you don't know, please enter age)";
        echo $this->Form->input('Age', array('style' => 'width:50px'));
        echo $this->Form->input('sex', array('style' => 'width:50px'));
        ?>
    </fieldset>
    <div>
        <?php echo $this->Form->submit('Add another relative', array('name' => 'Add_another_relative', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Finished!', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Clients Listing'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'search')); ?> </li>
    </ul>
</div>

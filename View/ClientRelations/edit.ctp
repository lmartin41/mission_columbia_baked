<div class="clientRelations form">
    <?php echo $this->Form->create('ClientRelation'); ?>
    <fieldset>
        <legend><?php echo __('Edit Client Relation'); ?></legend>
        <?php
        echo $this->Form->input('first_name');
        echo $this->Form->input('last_name');
        echo $this->Form->input('relationship');
        echo 'Note: Enter either age or DOB';
        echo $this->Form->input('DOB', array('type' => 'date', 'empty' => true));
        echo $this->Form->input('age');

        $options = array('M' => 'Male', 'F' => 'Female');
        $attributes = array('legend' => false);
        echo $this->Form->radio('sex', $options, $attributes);
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

        <?php echo $this->Html->link(__('Client Listing'), array('controller' => 'clients', 'action' => 'index')); ?><br /><br />
        <?php echo $this->Html->link(__('Relatives Listing'), array('action' => 'index', $clientID)); ?><br /><br />
        <?php echo $this->Form->postLink(__('Delete This Relative'), 
                array('action' => 'delete', $this->Form->value('ClientRelation.id'), 
                    $clientID), null, __('Are you sure you want to delete %s?', 
                            $this->Form->value('ClientRelation.first_name'))); ?>

    
</div>

<div class="resources form">
    <?php echo $this->Form->create('Resource'); ?>
    <fieldset>
        <legend><?php echo __('Edit Resource'); ?></legend>
        <?php
        echo $this->Form->input('resource_name');
        echo $this->Form->input('description');
        echo $this->Form->input('inventory');
        echo $this->Form->input('resource_status');
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

        <li><?php echo $this->Form->postLink(__('Delete this Resource'), array('action' => 'delete', $this->Form->value('Resource.id')), null, __('Are you sure you want to delete %s?', $this->Form->value('Resource.resource_name'))); ?></li>
        <li><?php echo $this->Html->link(__('Resource Listing'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Upload Resource Photo'), array('action' => 'index')); ?></li>
    </ul>
</div>

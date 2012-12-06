<div class="actionsNoButton">
    <?php
    echo $this->Form->postLink(__('Delete'), array('action' => 'delete',
        $this->Form->value('Feedback.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Feedback.id')));
    ?><br />
    <?php echo $this->Html->link(__('List Feedbacks'), array('action' => 'index')); ?><br />
</div>

<div class="feedbacks form">
<?php echo $this->Form->create('Feedback'); ?>
    <fieldset>
        <legend><?php echo __('Edit Feedback'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('user_id');
        echo $this->Form->input('feedback');
        ?>
    </fieldset>
    <div>
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
<?php echo $this->Form->end(); ?>
    </div>
</div>


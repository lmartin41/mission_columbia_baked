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
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actionsNoButton">
    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete',
        $this->Form->value('Feedback.id')), null, __('Are you sure you want to delete # %s?', 
                $this->Form->value('Feedback.id'))); ?><br />
    <?php echo $this->Html->link(__('List Feedbacks'), array('action' => 'index')); ?><br />
    <?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?><br />
<?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> 

</div>

<div class="feedbacks view">
<h2><?php  echo __('Feedback'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($feedback['User']['username'], array('controller' => 'users', 'action' => 'view', $feedback['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Feedback'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['feedback']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($feedback['Feedback']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actionsNoButton">

		<?php echo $this->Html->link(__('Edit Feedback'), array('action' => 'edit', $feedback['Feedback']['id'])); ?><br /><br />
		<?php echo $this->Form->postLink(__('Delete Feedback'), array('action' => 'delete', $feedback['Feedback']['id']), null, __('Are you sure you want to delete # %s?', $feedback['Feedback']['id'])); ?><br /><Br />
		<?php echo $this->Html->link(__('List Feedbacks'), array('action' => 'index')); ?><br /><br />
		<?php echo $this->Html->link(__('New Feedback'), array('action' => 'add')); ?><br /><br />
		<?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?><br /><br />
		<?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?>
	
</div>

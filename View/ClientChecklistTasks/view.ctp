<div class="clientChecklistTasks view">
<h2><?php  echo __('Client Checklist Task'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clientChecklistTask['ClientChecklistTask']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client Checklist'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clientChecklistTask['ClientChecklist']['id'], array('controller' => 'client_checklists', 'action' => 'view', $clientChecklistTask['ClientChecklist']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task Name'); ?></dt>
		<dd>
			<?php echo h($clientChecklistTask['ClientChecklistTask']['task_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task Description'); ?></dt>
		<dd>
			<?php echo h($clientChecklistTask['ClientChecklistTask']['task_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($clientChecklistTask['ClientChecklistTask']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsCompleted'); ?></dt>
		<dd>
			<?php echo h($clientChecklistTask['ClientChecklistTask']['isCompleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsDeleted'); ?></dt>
		<dd>
			<?php echo h($clientChecklistTask['ClientChecklistTask']['isDeleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($clientChecklistTask['ClientChecklistTask']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($clientChecklistTask['ClientChecklistTask']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Client Checklist Task'), array('action' => 'edit', $clientChecklistTask['ClientChecklistTask']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Client Checklist Task'), array('action' => 'delete', $clientChecklistTask['ClientChecklistTask']['id']), null, __('Are you sure you want to delete # %s?', $clientChecklistTask['ClientChecklistTask']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Checklist Tasks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Checklist Task'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Checklists'), array('controller' => 'client_checklists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Checklist'), array('controller' => 'client_checklists', 'action' => 'add')); ?> </li>
	</ul>
</div>

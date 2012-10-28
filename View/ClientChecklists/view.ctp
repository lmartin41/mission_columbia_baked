<div class="clientChecklists view">
<h2><?php  echo __('Client Checklist'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clientChecklist['Client']['id'], array('controller' => 'clients', 'action' => 'view', $clientChecklist['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsCompleted'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['isCompleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsDeleted'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['isDeleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actionsNoButton">
	<ul>
		<li><?php echo $this->Html->link(__('Edit Client Checklist'), array('action' => 'edit', $clientChecklist['ClientChecklist']['id'])); ?> </li><br />
		<li><?php echo $this->Form->postLink(__('Delete Client Checklist'), array('action' => 'delete', $clientChecklist['ClientChecklist']['id']), null, __('Are you sure you want to delete # %s?', $clientChecklist['ClientChecklist']['id'])); ?> </li><br />
		<li><?php echo $this->Html->link(__('List Client Checklists'), array('action' => 'index')); ?> </li><br />
		<li><?php echo $this->Html->link(__('New Client Checklist'), array('action' => 'add')); ?> </li><br />
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li><br />
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li><br />
		<li><?php echo $this->Html->link(__('List Client Checklist Tasks'), array('controller' => 'client_checklist_tasks', 'action' => 'index')); ?> </li><br />
		<li><?php echo $this->Html->link(__('New Client Checklist Task'), array('controller' => 'client_checklist_tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Client Checklist Tasks'); ?></h3>
	<?php if (!empty($clientChecklist['ClientChecklistTask'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Client Checklist Id'); ?></th>
		<th><?php echo __('Task Name'); ?></th>
		<th><?php echo __('Task Description'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('IsCompleted'); ?></th>
		<th><?php echo __('IsDeleted'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($clientChecklist['ClientChecklistTask'] as $clientChecklistTask): ?>
		<tr>
			<td><?php echo $clientChecklistTask['id']; ?></td>
			<td><?php echo $clientChecklistTask['client_checklist_id']; ?></td>
			<td><?php echo $clientChecklistTask['task_name']; ?></td>
			<td><?php echo $clientChecklistTask['task_description']; ?></td>
			<td><?php echo $clientChecklistTask['comments']; ?></td>
			<td><?php echo $clientChecklistTask['isCompleted']; ?></td>
			<td><?php echo $clientChecklistTask['isDeleted']; ?></td>
			<td><?php echo $clientChecklistTask['created']; ?></td>
			<td><?php echo $clientChecklistTask['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'client_checklist_tasks', 'action' => 'view', $clientChecklistTask['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'client_checklist_tasks', 'action' => 'edit', $clientChecklistTask['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'client_checklist_tasks', 'action' => 'delete', $clientChecklistTask['id']), null, __('Are you sure you want to delete # %s?', $clientChecklistTask['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Client Checklist Task'), array('controller' => 'client_checklist_tasks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

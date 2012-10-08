<div class="resources view">
<h2><?php  echo __('Resource'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resource Name'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['resource_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($resource['Organization']['org_name'], array('controller' => 'organizations', 'action' => 'view', $resource['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resource Status'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['resource_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsDeleted'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['isDeleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Resource'), array('action' => 'edit', $resource['Resource']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Resource'), array('action' => 'delete', $resource['Resource']['id']), null, __('Are you sure you want to delete # %s?', $resource['Resource']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resources'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Organizations'), array('controller' => 'organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Organization'), array('controller' => 'organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resource Uses'), array('controller' => 'resource_uses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource Us'), array('controller' => 'resource_uses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Resource Uses'); ?></h3>
	<?php if (!empty($resource['ResourceUs'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Client Id'); ?></th>
		<th><?php echo __('Resource Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($resource['ResourceUs'] as $resourceUs): ?>
		<tr>
			<td><?php echo $resourceUs['id']; ?></td>
			<td><?php echo $resourceUs['client_id']; ?></td>
			<td><?php echo $resourceUs['resource_id']; ?></td>
			<td><?php echo $resourceUs['date']; ?></td>
			<td><?php echo $resourceUs['comments']; ?></td>
			<td><?php echo $resourceUs['created']; ?></td>
			<td><?php echo $resourceUs['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'resource_uses', 'action' => 'view', $resourceUs['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'resource_uses', 'action' => 'edit', $resourceUs['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'resource_uses', 'action' => 'delete', $resourceUs['id']), null, __('Are you sure you want to delete # %s?', $resourceUs['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Resource Us'), array('controller' => 'resource_uses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

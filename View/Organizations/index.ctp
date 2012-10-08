<div class="organizations index">
	<h2><?php echo __('Organizations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('org_name'); ?></th>
			<th><?php echo $this->Paginator->sort('org_type'); ?></th>
			<th><?php echo $this->Paginator->sort('address_one'); ?></th>
			<th><?php echo $this->Paginator->sort('address_two'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th><?php echo $this->Paginator->sort('zip'); ?></th>
			<th><?php echo $this->Paginator->sort('contact'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('phone_cell'); ?></th>
			<th><?php echo $this->Paginator->sort('phone_office'); ?></th>
			<th><?php echo $this->Paginator->sort('isDeleted'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($organizations as $organization): ?>
	<tr>
		<td><?php echo h($organization['Organization']['id']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['org_name']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['org_type']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['address_one']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['address_two']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['city']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['state']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['zip']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['contact']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['website']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['phone']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['phone_cell']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['phone_office']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['isDeleted']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['created']); ?>&nbsp;</td>
		<td><?php echo h($organization['Organization']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $organization['Organization']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $organization['Organization']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $organization['Organization']['id']), null, __('Are you sure you want to delete # %s?', $organization['Organization']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Organization'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>

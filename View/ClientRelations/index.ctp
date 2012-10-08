<div class="clientRelations index">
	<h2><?php echo __('Client Relations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('relationship'); ?></th>
			<th><?php echo $this->Paginator->sort('DOB'); ?></th>
			<th><?php echo $this->Paginator->sort('sex'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($clientRelations as $clientRelation): ?>
	<tr>
		<td><?php echo h($clientRelation['ClientRelation']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($clientRelation['Client']['last_name'], array('controller' => 'clients', 'action' => 'view', $clientRelation['Client']['id'])); ?>
		</td>
		<td><?php echo h($clientRelation['ClientRelation']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($clientRelation['ClientRelation']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($clientRelation['ClientRelation']['relationship']); ?>&nbsp;</td>
		<td><?php echo h($clientRelation['ClientRelation']['DOB']); ?>&nbsp;</td>
		<td><?php echo h($clientRelation['ClientRelation']['sex']); ?>&nbsp;</td>
		<td><?php echo h($clientRelation['ClientRelation']['created']); ?>&nbsp;</td>
		<td><?php echo h($clientRelation['ClientRelation']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $clientRelation['ClientRelation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $clientRelation['ClientRelation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $clientRelation['ClientRelation']['id']), null, __('Are you sure you want to delete # %s?', $clientRelation['ClientRelation']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Client Relation'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>

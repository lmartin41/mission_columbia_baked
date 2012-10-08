<div class="clients index">
	<h2><?php echo __('Clients'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('DOB'); ?></th>
			<th><?php echo $this->Paginator->sort('sex'); ?></th>
			<th><?php echo $this->Paginator->sort('SSN'); ?></th>
			<th><?php echo $this->Paginator->sort('address_one'); ?></th>
			<th><?php echo $this->Paginator->sort('address_two'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th><?php echo $this->Paginator->sort('zip'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('apartment_number'); ?></th>
			<th><?php echo $this->Paginator->sort('how_did_you_hear'); ?></th>
			<th><?php echo $this->Paginator->sort('how_long_do_you_need'); ?></th>
			<th><?php echo $this->Paginator->sort('isDeleted'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($clients as $client): ?>
	<tr>
		<td><?php echo h($client['Client']['id']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['DOB']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['sex']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['SSN']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['address_one']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['address_two']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['city']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['state']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['zip']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['phone']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['apartment_number']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['how_did_you_hear']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['how_long_do_you_need']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['isDeleted']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['created']); ?>&nbsp;</td>
		<td><?php echo h($client['Client']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $client['Client']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $client['Client']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $client['Client']['id']), null, __('Are you sure you want to delete # %s?', $client['Client']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Client'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Client Incomes'), array('controller' => 'client_incomes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Income'), array('controller' => 'client_incomes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Relations'), array('controller' => 'client_relations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Relation'), array('controller' => 'client_relations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Specifics'), array('controller' => 'client_specifics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Specific'), array('controller' => 'client_specifics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resource Uses'), array('controller' => 'resource_uses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource Us'), array('controller' => 'resource_uses', 'action' => 'add')); ?> </li>
	</ul>
</div>

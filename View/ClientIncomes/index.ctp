<div class="clientIncomes index">
	<h2><?php echo __('Client Incomes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('regular_job'); ?></th>
			<th><?php echo $this->Paginator->sort('food_stamps'); ?></th>
			<th><?php echo $this->Paginator->sort('veterans_pension'); ?></th>
			<th><?php echo $this->Paginator->sort('part_time_job'); ?></th>
			<th><?php echo $this->Paginator->sort('social_security'); ?></th>
			<th><?php echo $this->Paginator->sort('annuity_check'); ?></th>
			<th><?php echo $this->Paginator->sort('child_support'); ?></th>
			<th><?php echo $this->Paginator->sort('ssi_or_disability'); ?></th>
			<th><?php echo $this->Paginator->sort('unemployment'); ?></th>
			<th><?php echo $this->Paginator->sort('when_next_check'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($clientIncomes as $clientIncome): ?>
	<tr>
		<td><?php echo h($clientIncome['ClientIncome']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($clientIncome['Client']['last_name'], array('controller' => 'clients', 'action' => 'view', $clientIncome['Client']['id'])); ?>
		</td>
		<td><?php echo h($clientIncome['ClientIncome']['regular_job']); ?>&nbsp;</td>
		<td><?php echo h($clientIncome['ClientIncome']['food_stamps']); ?>&nbsp;</td>
		<td><?php echo h($clientIncome['ClientIncome']['veterans_pension']); ?>&nbsp;</td>
		<td><?php echo h($clientIncome['ClientIncome']['part_time_job']); ?>&nbsp;</td>
		<td><?php echo h($clientIncome['ClientIncome']['social_security']); ?>&nbsp;</td>
		<td><?php echo h($clientIncome['ClientIncome']['annuity_check']); ?>&nbsp;</td>
		<td><?php echo h($clientIncome['ClientIncome']['child_support']); ?>&nbsp;</td>
		<td><?php echo h($clientIncome['ClientIncome']['ssi_or_disability']); ?>&nbsp;</td>
		<td><?php echo h($clientIncome['ClientIncome']['unemployment']); ?>&nbsp;</td>
		<td><?php echo h($clientIncome['ClientIncome']['when_next_check']); ?>&nbsp;</td>
		<td><?php echo h($clientIncome['ClientIncome']['created']); ?>&nbsp;</td>
		<td><?php echo h($clientIncome['ClientIncome']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $clientIncome['ClientIncome']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $clientIncome['ClientIncome']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $clientIncome['ClientIncome']['id']), null, __('Are you sure you want to delete # %s?', $clientIncome['ClientIncome']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Client Income'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>

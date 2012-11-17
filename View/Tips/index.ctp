<div class="actionsNoButton tips">
	<?php echo $this->Html->link(__('List Tips'), array('action' => 'index'), array('class' => 'active_link')); ?><br/>
	<?php echo $this->Html->link(__('New Tip'), array('action' => 'add')); ?>
</div>
<div class="tips index">
	<h2><?php echo __('Tips'); ?></h2>
	<table>
	<tr>
			<!--<th><?php echo $this->Paginator->sort('organization'); ?></th>-->
			<th><?php echo $this->Paginator->sort('controller'); ?></th>
			<th><?php echo $this->Paginator->sort('view'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($tips as $tip): ?>
	<tr>
		<!--<td>
			<?php echo $this->Html->link($tip['Organization']['org_name'], array('controller' => 'organizations', 'action' => 'view', $tip['Organization']['id'])); ?>
		</td>-->
		<td><?php echo h($tip['Tip']['controller']); ?>&nbsp;</td>
		<td><?php echo h($tip['Tip']['view']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tip['Tip']['id'])); ?>
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

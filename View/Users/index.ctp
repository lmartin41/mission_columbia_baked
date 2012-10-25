<div class="actionsNoButton users">
		<?php echo $this->Html->link(__('List Users'), array('action' => 'index'), array('class' => 'active_link'));?>
		<?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?>
		<?php if($hideDeleted): ?>
			<?php echo $this->Html->link(__('Hide Deleted Users'), array('action' => 'index')); ?><br /><br />
		<?php else: ?>
			<?php echo $this->Html->link(__('Show Deleted Users'), array('action' => 'index', '?' => array('showAll' => true))); ?>
		<?php endif;?>
</div>
<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table>
	<tr>
			<th><?php echo $this->Paginator->sort('username'); ?></th>
			<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Organization']['org_name'], array('controller' => 'organizations', 'action' => 'view', $user['Organization']['id'])); ?>
		</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
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

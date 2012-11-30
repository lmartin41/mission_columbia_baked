<div class="actionsNoButton">
		<?php echo $this->Html->link(__('Add Field'), array('action' => 'add')); ?><br />
                <?php echo $this->Html->link(__('Customize'), array('controller' => 'customize', 'action' => 'index')); ?><br />
</div>

<div class="fields index">
	<h2><?php echo __('Fields'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('organization_id'); ?></th>
			<th><?php echo $this->Paginator->sort('table_ref'); ?></th>
                        <th><?php echo $this->Paginator->sort('field_name'); ?></th>
			<th><?php echo $this->Paginator->sort('field_type'); ?></th>
			<th class="actions"><?php echo __(''); ?></th>
	</tr>
	<?php
	foreach ($fields as $field): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($field['Organization']['org_name'], array('controller' => 'organizations', 'action' => 'view', $field['Organization']['id'])); ?>
		</td>
		<td><?php echo h($field['Field']['table_ref']); ?>&nbsp;</td>
                <td><?php echo h($field['Field']['field_name']); ?>&nbsp;</td>
		<td><?php echo h($field['Field']['field_type']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $field['Field']['id'])); ?>
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


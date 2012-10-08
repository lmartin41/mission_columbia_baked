<div class="clientRelations view">
<h2><?php  echo __('Client Relation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clientRelation['ClientRelation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clientRelation['Client']['last_name'], array('controller' => 'clients', 'action' => 'view', $clientRelation['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($clientRelation['ClientRelation']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($clientRelation['ClientRelation']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Relationship'); ?></dt>
		<dd>
			<?php echo h($clientRelation['ClientRelation']['relationship']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DOB'); ?></dt>
		<dd>
			<?php echo h($clientRelation['ClientRelation']['DOB']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo h($clientRelation['ClientRelation']['sex']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($clientRelation['ClientRelation']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($clientRelation['ClientRelation']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Client Relation'), array('action' => 'edit', $clientRelation['ClientRelation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Client Relation'), array('action' => 'delete', $clientRelation['ClientRelation']['id']), null, __('Are you sure you want to delete # %s?', $clientRelation['ClientRelation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Relations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Relation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>

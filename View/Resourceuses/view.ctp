<div class="resourceuses view">
<h2><?php  echo __('Resourceus'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($resourceus['Resourceus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($resourceus['Client']['last_name'], array('controller' => 'clients', 'action' => 'view', $resourceus['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resource'); ?></dt>
		<dd>
			<?php echo $this->Html->link($resourceus['Resource']['resource_name'], array('controller' => 'resources', 'action' => 'view', $resourceus['Resource']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($resourceus['Resourceus']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($resourceus['Resourceus']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($resourceus['Resourceus']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($resourceus['Resourceus']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Resourceus'), array('action' => 'edit', $resourceus['Resourceus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Resourceus'), array('action' => 'delete', $resourceus['Resourceus']['id']), null, __('Are you sure you want to delete # %s?', $resourceus['Resourceus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resourceuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resourceus'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="resourceuses view">
<h2><?php  echo __('Resource Usage'); ?></h2>
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
		<li><?php echo $this->Html->link(__('Edit This Resource Use'), array('action' => 'edit', $resourceus['Resourceus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete this Resource Use'), array('action' => 'delete', $resourceus['Resourceus']['id']), null, __('Are you sure you want to delete # %s?', $resourceus['Resourceus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Resource Use Listing'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Clients Listing'), array('controller' => 'clients', 'action' => 'browse')); ?> </li>
		<li><?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
	</ul>
</div>

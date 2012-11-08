<div class="actionsNoButton">
	<?php echo $this->Html->link(__('Edit This Resource Use'), array('action' => 'edit', $resourceUs['ResourceUs']['id'])); ?><br /><br />
	<?php echo $this->Form->postLink(__('Delete this Resource Use'), array('action' => 'delete', $resourceUs['ResourceUs']['id']), null, __('Are you sure you want to delete # %s?', $resourceUs['ResourceUs']['id'])); ?><br /><br />
	<?php echo $this->Html->link(__('Resource Use Listing'), array('action' => 'index')); ?><br /><br />
	<?php echo $this->Html->link(__('Clients Listing'), array('controller' => 'clients', 'action' => 'browse')); ?><br /><Br />
	<?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'index')); ?>
</div>
<div class="resourceuses view">
<h2><?php  echo __('Resource Usage'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($resourceUs['ResourceUs']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($resourceUs['Client']['last_name'], array('controller' => 'clients', 'action' => 'view', $resourceUs['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resource'); ?></dt>
		<dd>
			<?php echo $this->Html->link($resourceUs['Resource']['resource_name'], array('controller' => 'resources', 'action' => 'view', $resourceUs['Resource']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($resourceUs['ResourceUs']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($resourceUs['ResourceUs']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($resourceUs['ResourceUs']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($resourceUs['ResourceUs']['modified']); ?>
			&nbsp;
		</dd>
		<br /><br /><br /><br /><br />
	</dl>
</div>

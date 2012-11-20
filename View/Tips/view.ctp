<div class="actionsNoButton tips">
	<?php echo $this->Html->link(__('List Tips'), array('action' => 'index')); ?> <br/>
	<?php echo $this->Html->link(__('New Tip'), array('action' => 'add')); ?> <br/>
	<?php echo $this->Html->link(__('Edit Tip'), array('action' => 'edit', $tip['Tip']['id'])); ?> <br/>
	<?php echo $this->Form->postLink(__('Delete Tip'), array('action' => 'delete', $tip['Tip']['id']), null, __('Are you sure you want to delete # %s?', $tip['Tip']['id'])); ?>
</div>
<div class="tips view">
<h2><?php  echo __('Tip'); ?></h2>
	<dl>
		<dt><?php echo __('Organization'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tip['Organization']['org_name'], array('controller' => 'organizations', 'action' => 'view', $tip['Organization']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Controller'); ?></dt>
		<dd>
			<?php echo h($tip['Tip']['controller']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('View'); ?></dt>
		<dd>
			<?php echo h($tip['Tip']['view']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tip'); ?></dt>
		<dd>
			<?php echo $tip['Tip']['tip']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Deleted?'); ?>
		<dd>
			<?php 
				if( $tip['Tip']['isDeleted'] === true )
				{
					echo __('True');
				}
				else
				{
					echo __('False');
				} 
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tip['Tip']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tip['Tip']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="actions">
	<h3><?php echo __('Admin'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Feedback'), array('controller' => 'feedbacks', 'action' => 'index')); ?></li>
	</ul>
</div>
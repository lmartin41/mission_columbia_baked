<div class="clientChecklists view">
<h2><?php  echo __('Client Checklist'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clientChecklist['Client']['id'], array('controller' => 'clients', 'action' => 'view', $clientChecklist['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task1name'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task1name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task1comments'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task1comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task1isCompleted'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task1isCompleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task2name'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task2name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task2comments'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task2comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task2isCompleted'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task2isCompleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task3name'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task3name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task3comments'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task3comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task3isDeleted'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task3isDeleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task4name'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task4name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task4comments'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task4comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task4isDeleted'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task4isDeleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task5name'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task5name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task5comments'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task5comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task5isDeleted'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task5isDeleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task6name'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task6name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task6comments'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task6comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task6isCompleted'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task6isCompleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task7name'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task7name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task7comments'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task7comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task7isCompleted'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task7isCompleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task8name'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task8name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task8comments'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task8comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task8isCompleted'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task8isCompleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task9name'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task9name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task9comments'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task9comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task9isCompleted'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task9isCompleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task10name'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task10name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task10comments'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task10comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Task10isCompleted'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['task10isCompleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsCompleted'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['isCompleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsDeleted'); ?></dt>
		<dd>
			<?php echo h($clientChecklist['ClientChecklist']['isDeleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Client Checklist'), array('action' => 'edit', $clientChecklist['ClientChecklist']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Client Checklist'), array('action' => 'delete', $clientChecklist['ClientChecklist']['id']), null, __('Are you sure you want to delete # %s?', $clientChecklist['ClientChecklist']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Checklists'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Checklist'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>

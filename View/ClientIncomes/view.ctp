<div class="clientIncomes view">
<h2><?php  echo __('Client Income'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clientIncome['ClientIncome']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clientIncome['Client']['last_name'], array('controller' => 'clients', 'action' => 'view', $clientIncome['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Regular Job'); ?></dt>
		<dd>
			<?php echo h($clientIncome['ClientIncome']['regular_job']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Food Stamps'); ?></dt>
		<dd>
			<?php echo h($clientIncome['ClientIncome']['food_stamps']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Veterans Pension'); ?></dt>
		<dd>
			<?php echo h($clientIncome['ClientIncome']['veterans_pension']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Part Time Job'); ?></dt>
		<dd>
			<?php echo h($clientIncome['ClientIncome']['part_time_job']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Social Security'); ?></dt>
		<dd>
			<?php echo h($clientIncome['ClientIncome']['social_security']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Annuity Check'); ?></dt>
		<dd>
			<?php echo h($clientIncome['ClientIncome']['annuity_check']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Child Support'); ?></dt>
		<dd>
			<?php echo h($clientIncome['ClientIncome']['child_support']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ssi Or Disability'); ?></dt>
		<dd>
			<?php echo h($clientIncome['ClientIncome']['ssi_or_disability']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unemployment'); ?></dt>
		<dd>
			<?php echo h($clientIncome['ClientIncome']['unemployment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('When Next Check'); ?></dt>
		<dd>
			<?php echo h($clientIncome['ClientIncome']['when_next_check']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($clientIncome['ClientIncome']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($clientIncome['ClientIncome']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Client Income'), array('action' => 'edit', $clientIncome['ClientIncome']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Client Income'), array('action' => 'delete', $clientIncome['ClientIncome']['id']), null, __('Are you sure you want to delete # %s?', $clientIncome['ClientIncome']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Incomes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Income'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>

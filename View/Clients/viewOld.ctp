<div class="clients view">
<h2><?php  echo __('Client'); ?></h2>
	<dl>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($client['Client']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($client['Client']['last_name']); ?>
			&nbsp;
		</dd>
                 <dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($client['Client']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('DOB'); ?></dt>
		<dd>
			<?php echo h($client['Client']['DOB']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo h($client['Client']['sex']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SSN'); ?></dt>
		<dd>
			<?php echo h($client['Client']['SSN']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address One'); ?></dt>
		<dd>
			<?php echo h($client['Client']['address_one']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Two'); ?></dt>
		<dd>
			<?php echo h($client['Client']['address_two']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($client['Client']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($client['Client']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($client['Client']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($client['Client']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apartment Number'); ?></dt>
		<dd>
			<?php echo h($client['Client']['apartment_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('How Did You Hear'); ?></dt>
		<dd>
			<?php echo h($client['Client']['how_did_you_hear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('How Long Do You Need'); ?></dt>
		<dd>
			<?php echo h($client['Client']['how_long_do_you_need']); ?>
			&nbsp;
		</dd>
                
                <?php if ($current_user['isSuperAdmin']): ?>
		<dt><?php echo __('IsDeleted'); ?></dt>
		<dd>
			<?php echo h($client['Client']['isDeleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($client['Client']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($client['Client']['modified']); ?>
			&nbsp;
		</dd>
                <?php endif; ?>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Client'), array('action' => 'edit', $client['Client']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Client'), array('action' => 'delete', $client['Client']['id']), null, __('Are you sure you want to delete # %s?', $client['Client']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Incomes'), array('controller' => 'client_incomes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Income'), array('controller' => 'client_incomes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Relations'), array('controller' => 'client_relations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Relation'), array('controller' => 'client_relations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Specifics'), array('controller' => 'client_specifics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Specific'), array('controller' => 'client_specifics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resource Uses'), array('controller' => 'resource_uses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource Us'), array('controller' => 'resource_uses', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="related">
	<h3><?php echo h($client['Client']['first_name']); echo __("'s Source of Income"); ?></h3>
	<?php if (!empty($client['ClientIncome'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Client Id'); ?></th>
		<th><?php echo __('Regular Job'); ?></th>
		<th><?php echo __('Food Stamps'); ?></th>
		<th><?php echo __('Veterans Pension'); ?></th>
		<th><?php echo __('Part Time Job'); ?></th>
		<th><?php echo __('Social Security'); ?></th>
		<th><?php echo __('Annuity Check'); ?></th>
		<th><?php echo __('Child Support'); ?></th>
		<th><?php echo __('Ssi Or Disability'); ?></th>
		<th><?php echo __('Unemployment'); ?></th>
		<th><?php echo __('When Next Check'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['ClientIncome'] as $clientIncome): ?>
		<tr>
			<td><?php echo $clientIncome['id']; ?></td>
			<td><?php echo $clientIncome['client_id']; ?></td>
			<td><?php echo $clientIncome['regular_job']; ?></td>
			<td><?php echo $clientIncome['food_stamps']; ?></td>
			<td><?php echo $clientIncome['veterans_pension']; ?></td>
			<td><?php echo $clientIncome['part_time_job']; ?></td>
			<td><?php echo $clientIncome['social_security']; ?></td>
			<td><?php echo $clientIncome['annuity_check']; ?></td>
			<td><?php echo $clientIncome['child_support']; ?></td>
			<td><?php echo $clientIncome['ssi_or_disability']; ?></td>
			<td><?php echo $clientIncome['unemployment']; ?></td>
			<td><?php echo $clientIncome['when_next_check']; ?></td>
			<td><?php echo $clientIncome['created']; ?></td>
			<td><?php echo $clientIncome['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'client_incomes', 'action' => 'view', $clientIncome['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'client_incomes', 'action' => 'edit', $clientIncome['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'client_incomes', 'action' => 'delete', $clientIncome['id']), null, __('Are you sure you want to delete # %s?', $clientIncome['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Client Income'), array('controller' => 'client_incomes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Client Relations'); ?></h3>
	<?php if (!empty($client['ClientRelation'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Client Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Relationship'); ?></th>
		<th><?php echo __('DOB'); ?></th>
		<th><?php echo __('Sex'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['ClientRelation'] as $clientRelation): ?>
		<tr>
			<td><?php echo $clientRelation['id']; ?></td>
			<td><?php echo $clientRelation['client_id']; ?></td>
			<td><?php echo $clientRelation['first_name']; ?></td>
			<td><?php echo $clientRelation['last_name']; ?></td>
			<td><?php echo $clientRelation['relationship']; ?></td>
			<td><?php echo $clientRelation['DOB']; ?></td>
			<td><?php echo $clientRelation['sex']; ?></td>
			<td><?php echo $clientRelation['created']; ?></td>
			<td><?php echo $clientRelation['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'client_relations', 'action' => 'view', $clientRelation['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'client_relations', 'action' => 'edit', $clientRelation['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'client_relations', 'action' => 'delete', $clientRelation['id']), null, __('Are you sure you want to delete # %s?', $clientRelation['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Client Relation'), array('controller' => 'client_relations', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Client Specifics'); ?></h3>
	<?php if (!empty($client['ClientSpecific'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Client Id'); ?></th>
		<th><?php echo __('Pregnant'); ?></th>
		<th><?php echo __('Disabled'); ?></th>
		<th><?php echo __('Handicapped'); ?></th>
		<th><?php echo __('Stove'); ?></th>
		<th><?php echo __('Refrigerator'); ?></th>
		<th><?php echo __('Cell'); ?></th>
		<th><?php echo __('Cable'); ?></th>
		<th><?php echo __('Internet'); ?></th>
		<th><?php echo __('Car Truck Model'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['ClientSpecific'] as $clientSpecific): ?>
		<tr>
			<td><?php echo $clientSpecific['id']; ?></td>
			<td><?php echo $clientSpecific['client_id']; ?></td>
			<td><?php echo $clientSpecific['pregnant']; ?></td>
			<td><?php echo $clientSpecific['disabled']; ?></td>
			<td><?php echo $clientSpecific['handicapped']; ?></td>
			<td><?php echo $clientSpecific['stove']; ?></td>
			<td><?php echo $clientSpecific['refrigerator']; ?></td>
			<td><?php echo $clientSpecific['cell']; ?></td>
			<td><?php echo $clientSpecific['cable']; ?></td>
			<td><?php echo $clientSpecific['internet']; ?></td>
			<td><?php echo $clientSpecific['car_truck_model']; ?></td>
			<td><?php echo $clientSpecific['created']; ?></td>
			<td><?php echo $clientSpecific['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'client_specifics', 'action' => 'view', $clientSpecific['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'client_specifics', 'action' => 'edit', $clientSpecific['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'client_specifics', 'action' => 'delete', $clientSpecific['id']), null, __('Are you sure you want to delete # %s?', $clientSpecific['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Client Specific'), array('controller' => 'client_specifics', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Resource Uses'); ?></h3>
	<?php if (!empty($client['ResourceUs'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Client Id'); ?></th>
		<th><?php echo __('Resource Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['ResourceUs'] as $resourceUs): ?>
		<tr>
			<td><?php echo $resourceUs['id']; ?></td>
			<td><?php echo $resourceUs['client_id']; ?></td>
			<td><?php echo $resourceUs['resource_id']; ?></td>
			<td><?php echo $resourceUs['date']; ?></td>
			<td><?php echo $resourceUs['comments']; ?></td>
			<td><?php echo $resourceUs['created']; ?></td>
			<td><?php echo $resourceUs['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'resource_uses', 'action' => 'view', $resourceUs['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'resource_uses', 'action' => 'edit', $resourceUs['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'resource_uses', 'action' => 'delete', $resourceUs['id']), null, __('Are you sure you want to delete # %s?', $resourceUs['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Resource Us'), array('controller' => 'resource_uses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

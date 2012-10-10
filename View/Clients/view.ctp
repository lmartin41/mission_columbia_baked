<div class="clients view">

    
<?php /***************** details ******************************************/ ?>
    
    
<h2><?php echo h($client['Client']['first_name'])." 's Details"; ?></h2>
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
<br />
<?php echo $this->Html->link(__('Edit Details'), array('action' => 'edit')); ?> 
<br />
<br />
<br />


<?php /***************** Income ******************************************/ ?>


<?php           
                /** FIXME: This is a hack and needs to be refactored later - Lee **/
                $regular = $food = $veterans = $part_time = $social = $annuity = $child = $ssi = $unemployment = $when = $created = $modified = "";
		foreach ($client['ClientIncome'] as $clientIncome) {
                     if ($clientIncome['client_id'] == $client['Client']['id']) {
			$regular = $clientIncome['regular_job'];
                        $food = $clientIncome['food_stamps'];
                        $veterans = $clientIncome['veterans_pension'];
                        $part_time = $clientIncome['part_time_job'];
                        $social = $clientIncome['social_security'];
                        $annuity = $clientIncome['annuity_check']; 
                        $child = $clientIncome['child_support'];
                        $ssi = $clientIncome['ssi_or_disability'];
                        $unemployment = $clientIncome['unemployment'];
                        $when = $clientIncome['when_next_check'];
                        $created = $clientIncome['created'];
                        $modified = $clientIncome['modified']; 
                     }
                }
                
                $pregnant = $disabled = $handicapped = $stove = $refrigerator = $cell = $cable = $internet = $car = $sp_created = $sp_modified = "";
                foreach ($client['ClientSpecific'] as $specifics) {
                     if ($specifics['client_id'] == $client['Client']['id']) {
			$pregnant = $specifics['pregnant'];
                        $disabled = $specifics['disabled'];
                        $handicapped = $specifics['handicapped'];
                        $stove = $specifics['stove'];
                        $refrigerator = $specifics['refrigerator'];
                        $cell = $specifics['cell']; 
                        $cable = $specifics['cable'];
                        $internet = $specifics['internet'];
                        $car = $specifics['car_truck_model'];
                        $sp_created = $specifics['created'];
                        $sp_modified = $specifics['modified']; 
                     }
                }
?>


<h2><?php echo h($client['Client']['first_name'])." 's Source of Income"; ?></h2>

        <dl>
		<dt><?php echo __('Regular Job'); ?></dt>
		<dd>
                        &nbsp;
			<?php echo $regular; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Food Stamps'); ?></dt>
		<dd>
                        &nbsp;
			<?php echo $food; ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Veterans Pension'); ?></dt>
		<dd>
                        &nbsp;
			<?php echo $veterans; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Part Time Job'); ?></dt>
		<dd>
                        &nbsp;
			<?php echo $part_time; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Social Security'); ?></dt>
		<dd>
                        &nbsp;
			<?php echo $social; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Annuity Check'); ?></dt>
		<dd>
                        &nbsp;
			<?php echo $annuity; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Child Support'); ?></dt>
		<dd>
                        &nbsp;
			<?php echo $child; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SSI Or Disability'); ?></dt>
		<dd>
                        &nbsp;
			<?php echo $ssi; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unemployment'); ?></dt>
		<dd>
                        &nbsp;
			<?php echo $unemployment; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('When Next Check'); ?></dt>
		<dd>
                        &nbsp;
			<?php echo $when; ?>
			&nbsp;
		</dd>
	</dl>

<br />
<?php echo $this->Html->link(__('Edit Income'), array('controller' => 'client_incomes', 'action' => 'edit')); ?>
<br />
<br />
<br />


<?php /***************** Relatives ******************************************/ ?>


<h2><?php echo h($client['Client']['first_name'])." 's Relatives"; ?></h2>
	<?php if (!empty($client['ClientRelation'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Relationship'); ?></th>
		<th><?php echo __('DOB'); ?></th>
		<th><?php echo __('Sex'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['ClientRelation'] as $clientRelation): 
                if ($clientRelation['client_id'] == $client['Client']['id']): ?>
		<tr>
			<td><?php echo $clientRelation['id']; ?></td>
			<td><?php echo $clientRelation['first_name']; ?></td>
			<td><?php echo $clientRelation['last_name']; ?></td>
			<td><?php echo $clientRelation['relationship']; ?></td>
			<td><?php echo $clientRelation['DOB']; ?></td>
			<td><?php echo $clientRelation['sex']; ?></td>
		</tr>
        <?php endif; ?>
	<?php endforeach; ?>
	</table>
<?php else: echo "none"; ?>
<?php endif; ?>


<br />
<br />
<?php echo $this->Html->link(__('Edit Relatives'), array('controller' => 'client_relations', 'action' => 'edit')); ?>
<br />
<br />
<br />


<?php /***************** Specifics ******************************************/ ?>


<h2><?php echo h($client['Client']['first_name'])." 's Specifics"; ?></h2>

        <dl>
		<dt><?php echo __('Pregnant'); ?></dt>
		<dd>
			<?php echo $pregnant; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disabled'); ?></dt>
		<dd>
			<?php echo $disabled; ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Handicapped'); ?></dt>
		<dd>
			<?php echo $handicapped; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stove'); ?></dt>
		<dd>
			<?php echo $stove; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Refrigerator'); ?></dt>
		<dd>
			<?php echo $refrigerator; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cell'); ?></dt>
		<dd>
			<?php echo $cell; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cable'); ?></dt>
		<dd>
			<?php echo $cable; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Internet'); ?></dt>
		<dd>
			<?php echo $internet; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model of Car'); ?></dt>
		<dd>
			<?php echo $car; ?>
			&nbsp;
		</dd>
	</dl>

<br />
<br />
<?php echo $this->Html->link(__('Edit Client Specifics'), array('controller' => 'client_specifics', 'action' => 'edit')); ?> 
<br />
<br />
<br />


<?php /***************** Resources ******************************************/ ?>


<h2><?php echo h($client['Client']['first_name'])." 's Resource Use"; ?></h2>

	<?php if (!empty($client['ResourceUs'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Client Id'); ?></th>
		<th><?php echo __('Resource Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Comments'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['ResourceUs'] as $resourceUs): 
                if ($resourceUs['client_id'] == $client['Client']['id']): ?>
		<tr>
			<td><?php echo $resourceUs['id']; ?></td>
			<td><?php echo $resourceUs['client_id']; ?></td>
			<td><?php echo $resourceUs['resource_id']; ?></td>
			<td><?php echo $resourceUs['date']; ?></td>
			<td><?php echo $resourceUs['comments']; ?></td>
		</tr>
        <?php endif; ?>
	<?php endforeach; ?>
	</table>
<?php else: echo "none"; ?>
<?php endif; ?>

<br /><br />
<?php echo $this->Html->link(__('Edit Resource Uses'), array('controller' => 'resource_uses', 'action' => 'edit')); ?>



</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
                <li><?php echo $this->Html->link(__('Clients Listing'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit This Client'), array('action' => 'edit', $client['Client']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete This Client'), array('action' => 'delete', $client['Client']['id']), null, __('Are you sure you want to delete # %s?', $client['Client']['id'])); ?> </li>
                <li><?php echo $this->Html->link(__('Print this Client Summary'), array('action' => 'add')); ?> </li>	
		<li><?php echo $this->Html->link(__('Create a new Client'), array('action' => 'add')); ?> </li>		
	</ul>
</div>


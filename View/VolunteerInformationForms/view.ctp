<div class="actionsNoButton">

	
		<?php echo $this->Html->link(__('Edit Volunteer Information Form'), array('action' => 'edit', $volunteerInformationForm['VolunteerInformationForm']['id'])); ?><br />
		<?php echo $this->Form->postLink(__('Delete Volunteer Information Form'), array('action' => 'delete', $volunteerInformationForm['VolunteerInformationForm']['id']), null, __('Are you sure you want to delete # %s?', $volunteerInformationForm['VolunteerInformationForm']['id'])); ?><br />
		<?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?><br />
		<?php echo $this->Html->link(__('Search for Clients'), array('controller' => 'clients', 'action' => 'index')); ?>
	
</div>

<div class="volunteerInformationForms view">
<h2><?php  echo __('Volunteer Information Form'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($volunteerInformationForm['User']['username'], array('controller' => 'users', 'action' => 'view', $volunteerInformationForm['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Middle Initial'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['middle_initial']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street Address'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['street_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Home Phone'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['home_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Work Phone'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['work_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cell Phone'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['cell_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency Name'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency Relationship'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency_relationship']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency Home Phone'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency_home_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency Work Phone'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency_work_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency Cell Phone'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency_cell_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency Street Address'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency_street_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency City'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency_city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency State'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency_state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency Zip'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency_zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency2 Name'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency2_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency2 Relationship'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency2_relationship']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency2 Home Phone'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency2_home_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency2 Work Phone'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency2_work_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency2 Cell Phone'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency2_cell_phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency2 Street Address'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency2_street_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency2 City'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency2_city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency2 State'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency2_state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Emergency2 Zip'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['emergency2_zip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Allergies'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['allergies']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IsDeleted'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['isDeleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($volunteerInformationForm['VolunteerInformationForm']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>


<div class="actionsNoButton">
    
        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $prayerRequest['PrayerRequest']['id'], $prayerRequest['Client']['id'])); ?> <br />
        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $prayerRequest['PrayerRequest']['id'], $prayerRequest['Client']['id']), null, __('Are you sure you want to delete # %s?', $prayerRequest['PrayerRequest']['id'])); ?><br />
        <?php echo $this->Html->link(__('Checklists Listing'), array('action' => 'index', $prayerRequest['Client']['id'])); ?> <br />
        <?php echo $this->Html->link(__('New Checklist'), array('action' => 'add', $prayerRequest['PrayerRequest']['id'])); ?><br />
        <?php echo $this->Html->link(__('Clients Listing'), array('controller' => 'clients', 'action' => 'browse')); ?> <br />
        <?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'index')); ?><br />
        <?php echo $this->Html->link(__('New Client Checklist Task'), array('controller' => 'client_checklist_tasks', 'action' => 'add')); ?>
    
</div>

<div class="prayerRequests view">
<h2><?php  echo __('Prayer Request'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($prayerRequest['PrayerRequest']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prayerRequest['Client']['id'], array('controller' => 'clients', 'action' => 'view', $prayerRequest['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($prayerRequest['PrayerRequest']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Request'); ?></dt>
		<dd>
			<?php echo h($prayerRequest['PrayerRequest']['request']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments'); ?></dt>
		<dd>
			<?php echo h($prayerRequest['PrayerRequest']['comments']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($prayerRequest['PrayerRequest']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($prayerRequest['PrayerRequest']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="actionsNoButton">
    
        <?php echo $this->Html->link(__('Edit Request'), array('action' => 'edit', $prayerRequest['PrayerRequest']['id'], $prayerRequest['Client']['id'])); ?> <br />
        <?php echo $this->Form->postLink(__('Delete Request'), array('action' => 'delete', $prayerRequest['PrayerRequest']['id'], $prayerRequest['Client']['id']), null, __('Are you sure you want to delete this prayer request?')); ?><br />
        <?php echo $this->Html->link(__('Requests Listing'), array('action' => 'index', $prayerRequest['Client']['id'])); ?> <br />
        <?php echo $this->Html->link(__('New Request'), array('action' => 'add', $prayerRequest['PrayerRequest']['id'])); ?><br />
        <?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'index')); ?><br />
    
</div>

<div class="prayerRequests view">
<h2><?php  echo __('Prayer Request'); ?></h2>
	<dl>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prayerRequest['Client']['first_name']." ".$prayerRequest['Client']['last_name'], array('controller' => 'clients', 'action' => 'view', $prayerRequest['Client']['id'])); ?>
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
                <dt><?php echo __('Date of Service'); ?></dt>
		<dd>
			<?php echo h($prayerRequest['PrayerRequest']['date']); ?>
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

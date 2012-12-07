<?php $this->Html->script('jquery.dataTables.min', FALSE); ?>
<?php $this->Html->script('dataTables.fnSetFilteringDelay', FALSE)?>
<?php $this->Html->script('users_index', FALSE); ?>
<?php $this->Html->css('jquery.dataTables_themeroller', 'stylesheet', array('inline' => FALSE)); ?>

<div class="actionsNoButton users">
		<?php echo $this->Html->link(__('List Users'), array('action' => 'index'), array('class' => 'active_link'));?><br />
		<?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?><br />
		<?php if($hideDeleted): ?>
			<?php echo $this->Html->link(__('Hide Deleted Users'), array('action' => 'index')); ?>
			<div id="show_all" class="do_not_show">true</div>
		<?php else: ?>
			<?php echo $this->Html->link(__('Show Deleted Users'), array('action' => 'index', '?' => array('showAll' => true))); ?>
			<div id="show_all" class="do_not_show">false</div>
		<?php endif;?>
</div>
<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<table id="usersResults">
   		<thead>
           	<tr>
               	<th>Username</th>
               	<th>Organization</th>
               	<th>Email</th>
           	</tr>
        </thead>
	</table>
	<?php if( $current_user['isSuperAdmin'] ): ?>
		<div id="org_id" class="do_not_show">-1</div>
	<?php else: ?>
		<div id="org_id" class="do_not_show"><?php echo $current_user['Organization']['id']; ?></div>
	<?php endif; ?>
</div>

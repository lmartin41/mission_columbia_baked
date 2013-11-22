<?php $this->Html->script('jquery.dataTables.min', FALSE); ?>
<?php $this->Html->script('dataTables.fnSetFilteringDelay', FALSE)?>
<?php $this->Html->script('clients_index', FALSE); ?>
<?php $this->Html->css('jquery.dataTables_themeroller', 'stylesheet', array('inline' => FALSE)); ?>
<div class="actionsNoButton clients smaller">
	<?php echo $this->Html->link(__('Search Clients'), array('action' => 'index'), array('class' => 'active_link')); ?><br />
	<?php echo $this->Html->link(__('Add a Client'), array('action' => 'add')); ?><br />
</div>
<div class="clients form">
    <h2>Client Search</h2>
    <table id="clientsResults">
   		<thead>
           	<tr>
               	<th>First Name</th>
               	<th>Last Name</th>
               	<th>DOB</th>
                <th>Comments</th>
           	</tr>
        </thead>
	</table>
</div>

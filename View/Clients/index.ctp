<?php $this->Html->script('jquery.dataTables.min', FALSE); ?>
<?php $this->Html->script('clients_index', FALSE); ?>
<?php $this->Html->css('jquery.dataTables_themeroller', 'stylesheet', array('inline' => FALSE)); ?>
<div class="clients form">
    <h2>Client Search</h2>
    <table id="clientsResults">
   		<thead>
           	<tr>
               	<th>First Name</th>
               	<th>Last Name</th>
               	<th>DOB</th>
           	</tr>
        </thead>
        <tbody>
        	<?php foreach ($clients as $result): ?>
                <tr id="client_<?php echo h($result['Client']['id']); ?>">
                    <td><?php echo h($result['Client']['first_name']); ?></td>
                    <td><?php echo h($result['Client']['last_name']); ?></td>
                    <td><?php echo date('m/d/Y', strtotime(h($result['Client']['DOB']))); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
	</table>
</div>
<div class="actionsNoButton">
	<?php echo $this->Html->link(__('Search Clients'), array('action' => 'index'), array('class' => 'active_link')); ?><br />
	<?php echo $this->Html->link(__('Add a Client'), array('action' => 'add')); ?><br />
</div>

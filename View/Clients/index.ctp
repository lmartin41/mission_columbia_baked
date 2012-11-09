<div class="clients form">
    <h2>Client Search</h2>
    <?php
    echo $this->Form->create();
    echo $this->Form->input("Name");
    echo $this->Form->end("Search");
    ?> 

    <div id="results">
    	<!-- This is for when you come to this page without ajax -->
    	<table>
            <tr>
                <th><?php echo $this->Paginator->sort('first_name')?></th>
                <th><?php echo $this->Paginator->sort('last_name')?></th>
                <th></th>
            </tr>
            <?php foreach ($clients as $result): ?>
                <tr>
                    <td><?php echo h($result['Client']['first_name']); ?>&nbsp;</td>
                    <td><?php echo h($result['Client']['last_name']); ?>&nbsp;</td>
                    <td><?php echo $this->Html->link('View Profile', array('action' => 'view', $result['Client']['id'])); ?>

                </tr>
            <?php endforeach; ?>
        </table>
        <p>
        	<?php
        		echo $this->Paginator->counter(array(
            			'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        			));
        	?>	
        </p>
    </div>
</div>
<div class="actionsNoButton">
	<?php echo $this->Html->link(__('Search Clients'), array('action' => 'index'), array('class' => 'active_link')); ?><Br />
	<?php echo $this->Html->link(__('Add a Client'), array('action' => 'add')); ?><br />
</div>

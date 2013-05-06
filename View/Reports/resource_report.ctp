<?php include("reportsDiv.ctp"); ?>

<div class="reports form">
    <h2>Number of Times this Resource has Been Used (Total)</h2>
    <div id="chartTotal_div"><?php $this->GoogleChart->createJsChart($chartTotal); ?></div>
    <h2>Number of Times this Resource has Been Used (Family Units)</h2>
    <div id="chartFamily_div"><?php $this->GoogleChart->createJsChart($chartFamily); ?></div>
    
    Total Number of Resource Usages (Total): <?php echo $countParticularTotal; ?><br />
    Total Number of Resource Usages (Family Units): <?php echo $countParticularFamily; ?><br />
    <br /><br />

<h2><?php echo __('Resource Usage Listing'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('client_id'); ?></th>
            <th><?php echo $this->Paginator->sort('resource_id'); ?></th>
            <th><?php echo $this->Paginator->sort('date'); ?></th>
            <th><?php echo $this->Paginator->sort('comments'); ?></th>
        </tr>
        <?php foreach ($resourceuses as $resourceus): ?>
            <tr>
                <td>
                    <?php echo $this->Html->link($resourceus['Client']['last_name'], array('controller' => 'clients', 'action' => 'view', $resourceus['Client']['id'])); ?>
                </td>
                <td>
                    <?php echo $this->Html->link($resourceus['Resource']['resource_name'], array('controller' => 'resources', 'action' => 'view', $resourceus['Resource']['id'])); ?>
                </td>
                <td><?php echo h($resourceus['ResourceUs']['date']); ?>&nbsp;</td>
                <td><?php echo h($resourceus['ResourceUs']['comments']); ?>&nbsp;</td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>

    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>

</div>
<?php echo $this->Html->script("datepickr.js", FALSE); ?>
<?php echo $this->Html->css("datepickr.css", FALSE); ?>

<div class="actionsNoButton">
    <?php echo $this->Html->link(__('Individual Reports'), array()); ?><br />
    <ul>
        <li><?php echo $this->Html->link(__('Clients'), array('controller' => 'reports', 'action' => 'index')); ?></li><br />
        <li><?php echo $this->Html->link(__('Resources'), array('controller' => 'reports', 'action' => 'resourceIndex')); ?></li><br />
    </ul>
    <?php echo $this->Html->link(__('Aggregate Reports'), array()); ?><br />
    <ul>
        <li><?php echo $this->Html->link('Counts', array('controller' => 'reports', 'action' => 'countsIndex')); ?></li><br />
        <li><?php echo $this->Html->link('Lists', array('controller' => 'reports', 'action' => 'listsIndex')); ?></li><br />
        <li><?php echo $this->Html->link('Logs', array('controller' => 'loggers', 'action' => 'index')); ?></li>
    </ul>

</div>

<div class="loggers index">
    <h2><?php echo __('Logs'); ?></h2>
    <?php if (!$showDiv): ?>
        <?php $startDate = Date('Y') . "-01-01"; ?>
        <?php $endDate = Date('Y-m-d'); ?>
    <?php endif; ?>

    <form name="logs" method="post">

        Date:<input name="startDate" id="datepickLogs" default="test" class="date-pick" style="width: 100px;" value = '<?php echo $startDate; ?>' />
        &nbsp;
        To:<input name="endDate" id="datepickLogs2" class="date-pick" style="width: 100px;" value ="<?php echo $endDate; ?>" />
        <br /><br /><br />

        <script type="text/javascript">
            new datepickr('datepickLogs', { dateFormat: 'Y-m-d' });
            new datepickr('datepickLogs2', { dateFormat: 'Y-m-d' });
        </script>

        <input type="submit" value="Retrieve Logs"/>
    </form>
    <br /><br />


    <?php if ($showDiv): echo"<div>"; ?>
    <?php else: echo"<div style='display:none'>"; ?>
    <?php endif; ?>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
            <th><?php echo $this->Paginator->sort('Category'); ?></th>
            <th><?php echo $this->Paginator->sort('action'); ?></th>
            <th><?php echo $this->Paginator->sort('Description'); ?></th>
            <th><?php echo $this->Paginator->sort('Date'); ?></th>
            <?php if ($isAtleastAdmin): ?><th class="actions"><?php echo __('Actions'); ?></th><?php endif; ?>
        </tr>
        <?php foreach ($loggers as $logger): ?>
            <?php if ($logger['User']['organization_id'] === $current_user['organization_id']): ?>
                <?php if (strtotime($logger['Logger']['created']) >= strtotime($startDate) && strtotime($logger['Logger']['created']) <= strtotime($endDate)): ?>
                    <tr>
                        <td>
                            <?php echo $this->Html->link($logger['User']['username'], array('controller' => 'users', 'action' => 'view', $logger['User']['id'])); ?>
                        </td>
                        <td><?php echo h($logger['Logger']['controller']); ?>&nbsp;</td>
                        <td><?php echo h($logger['Logger']['action']); ?>&nbsp;</td>
                        <td><?php echo h($logger['Logger']['description']); ?>&nbsp;</td>
                        <td><?php echo h($logger['Logger']['created']); ?>&nbsp;</td>
                        <td class="actions">
                            <?php if ($isAtleastAdmin): ?><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $logger['Logger']['id']), null, __('Are you sure you want to delete # %s?', $logger['Logger']['id'])); ?><?php endif; ?>   
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endif; ?>
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
</div>


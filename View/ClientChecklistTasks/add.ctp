<div class="actionsNoButton">

    <?php echo $this->Html->link(__('Browse Client Checklists'), array('controller' => 'client_checklists', 'action' => 'index', $clientChecklistID)); ?><br />
    <?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'client', 'action' => 'index')); ?><br />

</div>

<div class="clientChecklistTasks form">

    <h3><?php echo __('Current Client Checklist Tasks'); ?></h3>
    <table>
        <tr>
            <th>Task Name</th>
            <th>Task Description</th>
            <th>Comments</th>
        </tr>
        <?php
        foreach ($clientChecklistTasks as $clientChecklistTask):
            if (!$clientChecklistTask['ClientChecklistTask']['isDeleted']):
                ?>
                <tr>
                    <td><?php echo $clientChecklistTask['ClientChecklistTask']['task_name']; ?></td>
                    <td><?php echo $clientChecklistTask['ClientChecklistTask']['task_description']; ?>&nbsp;</td>
                    <td><?php echo $clientChecklistTask['ClientChecklistTask']['comments']; ?>&nbsp;</td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
    <br /><br /><br />
    <?php echo $this->Form->create('ClientChecklistTask'); ?>
    <fieldset>
        <legend><?php echo __('Add Client Checklist Task'); ?></legend>
        <?php
        echo $this->Form->input('task_name', array('value' => ''));
        echo $this->Form->input('task_description', array('value' => ''));
        echo $this->Form->input('comments', array('value' => ''));
        ?>
    </fieldset>
    <div>
        <?php echo $this->Form->submit('Add another Task', array('name' => 'Add_Another_Task', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>


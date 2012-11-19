<div class="actionsNoButton">


    <?php echo $this->Html->link(__('Checklists Listing'), array('action' => 'index', $clientID)); ?><br />
    <?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'index')); ?>


</div>

<div class="clientChecklists form">
    <?php echo $this->Form->create('ClientChecklist'); ?>
    <fieldset>
        <legend><?php echo __('Add Client Checklist'); ?></legend>
        <?php
        echo $this->Form->input('checklist_name');
        echo $this->Form->input('checklist_description');
        ?>
    </fieldset>

    <?php echo $this->Form->create('ClientChecklistTask'); ?>
    <fieldset>
        <legend><?php echo __('Add Client Checklist Task'); ?></legend>
        <?php
        echo $this->Form->input('task_name', array('value' => ""));
        echo $this->Form->input('task_description', array('value' => ""));
        echo $this->Form->input('comments', array('value' => ""));
        ?>
    </fieldset>
    <button type="button" onClick="addNewDiv()">Add another Task</button>

    <script type="text/javascript">
        function addNewDiv() {
            document.writeln('hey');
        }
    </script>

    <div>

        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>



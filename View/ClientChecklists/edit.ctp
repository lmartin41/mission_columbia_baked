<?php echo $this->Html->script("toggle.js", FALSE); ?>

<div class="clientChecklists form">
    <?php echo $this->Form->create('ClientChecklist'); ?>
    <fieldset>
        <legend><?php echo __('Edit Client Checklist'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('client_id');
        echo $this->Form->input('task1name');
        echo $this->Form->input('task1comments');
        echo $this->Form->input('task1isCompleted');
        ?>
        <br /><br />
        <h2>Edit a Second Task</h2>
        <a onclick = "return toggle('20');">Expand</a>
        <div id = "20" style = "display: none">
            <?php
            echo $this->Form->input('task2name');
            echo $this->Form->input('task2comments');
            echo $this->Form->input('task2isCompleted');
            ?>
        </div>
        <br /><br />
        <h2>Edit a Third Task</h2>
        <a onclick = "return toggle('21');">Expand</a>
        <div id = "21" style = "display: none">
            <?php
            echo $this->Form->input('task3name');
            echo $this->Form->input('task3comments');
            echo $this->Form->input('task3isCompleted');
            ?>
        </div>
        <br /><br />
        <h2>Edit a Fourth Task</h2>
        <a onclick = "return toggle('22');">Expand</a>
        <div id = "22" style = "display: none">
            <?php
            echo $this->Form->input('task4name');
            echo $this->Form->input('task4comments');
            echo $this->Form->input('task4isCompleted');
            ?>
        </div>
        <br /><br />
        <h2>Edit a Fifth Task</h2>
        <a onclick = "return toggle('23');">Expand</a>
        <div id = "23" style = "display: none">
            <?php
            echo $this->Form->input('task5name');
            echo $this->Form->input('task5comments');
            echo $this->Form->input('task5isCompleted');
            ?>
        </div>
        <br /><br />
        <h2>Edit a Sixth Task</h2>
        <a onclick = "return toggle('24');">Expand</a>
        <div id = "24" style = "display: none">
            <?php
            echo $this->Form->input('task6name');
            echo $this->Form->input('task6comments');
            echo $this->Form->input('task6isCompleted');
            ?>
        </div>
        <br /><br />
        <h2>Edit a Seventh Task</h2>
        <a onclick = "return toggle('25');">Expand</a>
        <div id = "25" style = "display: none">
            <?php
            echo $this->Form->input('task7name');
            echo $this->Form->input('task7comments');
            echo $this->Form->input('task7isCompleted');
            ?>
        </div>
        <br /><br />
        <h2>Edit an Eighth Task</h2>
        <a onclick = "return toggle('26');">Expand</a>
        <div id = "26" style = "display: none">
            <?php
            echo $this->Form->input('task8name');
            echo $this->Form->input('task8comments');
            echo $this->Form->input('task8isCompleted');
            ?>
        </div>
        <br /><br />
        <h2>Edit a Ninth Task</h2>
        <a onclick = "return toggle('27');">Expand</a>
        <div id = "27" style = "display: none">
            <?php
            echo $this->Form->input('task9name');
            echo $this->Form->input('task9comments');
            echo $this->Form->input('task9isCompleted');
            ?>
        </div>
        <br /><br />
        <h2>Edit a Tenth Task</h2>
        <a onclick = "return toggle('28');">Expand</a>
        <div id = "28" style = "display: none">
            <?php
            echo $this->Form->input('task10name');
            echo $this->Form->input('task10comments');
            echo $this->Form->input('task10isCompleted');
            ?>
        </div>
        <br /><br />

    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actionsNoButton">

        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', 
            $this->Form->value('ClientChecklist.id')), null, __('Are you sure you want to delete # %s?', 
                    $this->Form->value('ClientChecklist.id'))); ?><br /><br />
        <?php echo $this->Html->link(__('List Client Checklists'), array('action' => 'index', 'ClientChecklist.id')); ?><br /><br />
        <?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'index')); ?><br /><br />
        <?php echo $this->Html->link(__('Client Listing'), array('controller' => 'clients', 'action' => 'browse')); ?> 

</div>

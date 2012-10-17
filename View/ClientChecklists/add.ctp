<?php echo $this->Html->script("toggle.js", FALSE); ?>

<div class="clientChecklists form">
    <?php echo $this->Form->create('ClientChecklist'); ?>
    <fieldset>
        <legend><?php echo __('Add Client Checklist'); ?></legend>
        <?php
        echo $this->Form->input('client_id');
        echo $this->Form->input('task1name');
        echo $this->Form->input('task1comments');
        ?>
        <br /><br />
        <h2>Create a Second Task</h2>
        <a onclick = "return toggle('10');">Expand</a>
        <div id = "10" style = "display: none">
            <?php
            echo $this->Form->input('task2name');
            echo $this->Form->input('task2comments');
            ?>
        </div>
        <br /><br />
         <h2>Create a Third Task</h2>
        <a onclick = "return toggle('11');">Expand</a>
        <div id = "11" style = "display: none">
            <?php
            echo $this->Form->input('task3name');
            echo $this->Form->input('task3comments');
            ?>
        </div>
        <br /><br />
         <h2>Create a Fourth Task</h2>
        <a onclick = "return toggle('12');">Expand</a>
        <div id = "12" style = "display: none">
            <?php
            echo $this->Form->input('task4name');
            echo $this->Form->input('task4comments');
            ?>
        </div>
        <br /><br />
         <h2>Create a Fifth Task</h2>
        <a onclick = "return toggle('13');">Expand</a>
        <div id = "13" style = "display: none">
            <?php
            echo $this->Form->input('task5name');
            echo $this->Form->input('task5comments');
            ?>
        </div>
        <br /><br />
         <h2>Create a Sixth Task</h2>
        <a onclick = "return toggle('14');">Expand</a>
        <div id = "14" style = "display: none">
            <?php
            echo $this->Form->input('task6name');
            echo $this->Form->input('task6comments');
            ?>
        </div>
        <br /><br />
         <h2>Create a Seventh Task</h2>
        <a onclick = "return toggle('15');">Expand</a>
        <div id = "15" style = "display: none">
            <?php
            echo $this->Form->input('task7name');
            echo $this->Form->input('task7comments');
            ?>
        </div>
        <br /><br />
         <h2>Create an Eighth Task</h2>
        <a onclick = "return toggle('16');">Expand</a>
        <div id = "16" style = "display: none">
            <?php
            echo $this->Form->input('task8name');
            echo $this->Form->input('task8comments');
            ?>
        </div>
        <br /><br />
         <h2>Create a Ninth Task</h2>
        <a onclick = "return toggle('17');">Expand</a>
        <div id = "17" style = "display: none">
            <?php
            echo $this->Form->input('task9name');
            echo $this->Form->input('task9comments');
            ?>
        </div>
        <br /><br />
         <h2>Create a Tenth Task</h2>
        <a onclick = "return toggle('18');">Expand</a>
        <div id = "18" style = "display: none">
            <?php
            echo $this->Form->input('task10name');
            echo $this->Form->input('task10comments');
            ?>
        </div>
        <br /><br />
        
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Client Checklists'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
    </ul>
</div>

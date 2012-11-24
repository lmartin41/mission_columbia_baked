<?php echo $this->Html->script("client_add.js", FALSE); ?>
<?php echo $this->Html->script("ageDobAuto.js", FALSE); ?>

<style type="text/css">
    form label { 
        width: 7em; 
        float: left;
        padding: 0px;
    }
</style>

<div class="actionsNoButton">

    <?php echo $this->Html->link(__('Clients Listing'), array('controller' => 'clients', 'action' => 'index')); ?><br />
    <?php echo $this->Html->link(__('Search for a Client'), array('controller' => 'clients', 'action' => 'search')); ?> 

</div>

<div class="clientRelations form">
    <?php echo $this->Form->create('ClientRelation'); ?>
        <h2><?php echo __('Add Client Relation'); ?></h2>
        <table>
            <tr>
                <td>
                    <?php echo $this->Form->input('first_name'); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('last_name'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset>
                        <legend class="sex">Sex<span class="asteriks">*</span></legend>
                        <?php
                        $options = array('M' => 'Male', 'F' => 'Female');
                        $attributes = array('legend' => false);
                        echo $this->Form->radio('sex', $options, $attributes);
                        ?>
                    </fieldset>
                </td>
                <td>
                    <?php echo $this->Form->input('relationship'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('DOB', array('type' => 'date', 'onChange' => "updateAge('Relative')", 'minYear' => date('Y') - 120, 'maxYear' => date('Y'), 'empty' => true, 'div' => false, 'separator' => false)); ?>
                    &nbsp; &nbsp;<b>OR</b>
                </td>
                <td>
                    <?php echo $this->Form->input('age', array('onChange' => "updateDOB('Relative')")); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('isVerified'); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('whatVerification'); ?>
                </td>
            </tr>
        </table>
        <div>
            <?php echo $this->Form->submit('Add another relative', array('name' => 'Add_another_relative', 'div' => false)); ?>
            &nbsp;
            <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
            &nbsp;
            <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
            <?php echo $this->Form->end(); ?>
        </div>
</div>


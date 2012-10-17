<?php echo $this->Html->script("toggle.js", FALSE); ?>

<div class="clients form">
    <?php echo $this->Form->create('Client'); ?>
    <fieldset>
        <legend><?php echo __('Add Client'); ?></legend>
        <br />

        <!-----------  PERSONAL INFORMATION ------------------------->
        <h2>Personal Information</h2><br />

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
                    <?php echo $this->Form->input('DOB', array('type' => 'date', 'empty' => true)); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('age'); ?>
                </td>
                <td>
                    <?php
                    $options = array('M' => 'Male', 'F' => 'Female');
                    $attributes = array('legend' => false);
                    echo $this->Form->radio('sex', $options, $attributes);
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo $this->Form->input('address', array('style' => 'width: 400px')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('apartment_number'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('city'); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('state'); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('zip'); ?>
                </td>

            </tr>
        </table>
        <?php echo $this->Form->input('phone'); ?>

        <!---------------------------- SOURCE OF INCOME ----------------->

        <h2>Source of Income</h2>
        <a onclick="return toggle('1');">Expand</a>
        <div id ="1" style ="display: none">
            <table>
                <tr>
                    <td>
                        <?php echo $this->Form->input('regular_job'); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('food_stamps'); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('veterans_pension'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->Form->input('part_time_job'); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('social_security'); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('annuity_check'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->Form->input('child_support'); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('ssi_or_disability'); ?> 
                    </td>
                    <td>
                        <?php echo $this->Form->input('unemployment'); ?>
                    </td>
                </tr>
            </table>
            <?php echo $this->Form->input('when_next_check', array('type' => 'date', 'empty' => true)); ?>  
        </div>


        <!------------------------------- OTHER ------------------------------>
        <br /><br />
        <h2>Other Information</h2>
        <a onclick="return toggle('2');">Expand</a>
        <div id="2" style="display: none">
            <table>
                <tr>
                    <td>
                        <?php echo $this->Form->input('pregnant'); ?> 
                    </td>
                    <td>
                        <?php echo $this->Form->input('disabled'); ?>  
                    </td>
                    <td>
                        <?php echo $this->Form->input('handicapped'); ?> 
                    </td>
                    <td>
                        <?php echo $this->Form->input('stove'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->Form->input('refrigerator'); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('cell'); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('cable'); ?>
                    </td>
                    <td>
                        <?php echo $this->Form->input('internet'); ?>
                    </td>
                </tr>
            </table>
            <?php echo $this->Form->input('model'); ?>

            <?php
            echo $this->Form->input('how_did_you_hear');
            echo $this->Form->input('how_long_do_you_need');
            ?>
            <br />
        </div>
    </fieldset>

    <div>
        <?php echo $this->Form->submit(__('Save and Add Client Relatives'), array('name' => 'addMore', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Finished!', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Clients Listing'), array('action' => 'browse')); ?></li>
        <li><?php echo $this->Html->link(__('Upload Photo'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Search for a Client'), array('action' => 'index')); ?> </li>
    </ul>
</div>

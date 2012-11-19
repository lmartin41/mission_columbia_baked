<style type="text/css">
    form label { 
        width: 7em; 
        float: left;
        padding: 0px;
    }

    input {
        width: 100px;
    }


    select {
        margin-left: 20px;
    }

    h1 {
        font-size: 18px;
    }
</style>
<div class="actionsNoButton">


    <?php echo $this->Html->link(__('Users Listing'), array('controller' => 'users', 'action' => 'index')); ?><br />
    <?php echo $this->Html->link(__('Search for Clients'), array('controller' => 'clients', 'action' => 'index')); ?>

</div>
<div class="volunteerInformationForms form">
    <?php echo $this->Form->create('VolunteerInformationForm'); ?>
    <fieldset>
        <legend><?php echo __('Edit Volunteer Information Form'); ?></legend>
        <table>
            <tr>
                <td>
                    <?php echo $this->Form->input('first_name'); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('last_name'); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('middle_initial', array('style' => 'width: 30px')); ?>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td colspan="2">
                    <?php echo $this->Form->input('street_address', array('style' => 'width: 250px')); ?>
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
            <tr>
                <td>
                    <?php echo $this->Form->input('home_phone'); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('work_phone', array('label' => 'Work')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('cell_phone', array('label' => 'Cell')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('email'); ?>
                </td>
            </tr>
        </table>
        <br /><br />

        <h3>First Emergency Contact</h3>
        <table>
            <tr>
                <td colspan="2">
                    <?php echo $this->Form->input('emergency_name', array('label' => 'Name', 'style' => 'width: 250px')); ?>
                </td> 
                <td>
                    <?php echo $this->Form->input('emergency_relationship', array('label' => 'Relationship')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('emergency_home_phone', array('label' => 'Home Phone')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('emergency_work_phone', array('label' => 'Work Phone')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('emergency_cell_phone', array('label' => 'Cell Phone')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo $this->Form->input('emergency_street_address', array('label' => 'Street Address', 'style' => 'width: 250px')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('emergency_city', array('label' => 'City')); ?>
                </td>

                <td>
                    <?php echo $this->Form->input('emergency_state', array('label' => 'State')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('emergency_zip', array('label' => 'Zip')); ?>
                </td>
            </tr>
        </table>
        <br /><br />

        <h3>Second Emergency Contact</h3>
        <table>
            <tr>
                <td colspan="2">
                    <?php echo $this->Form->input('emergency2_name', array('label' => 'Name', 'style' => 'width: 250px')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('emergency2_relationship', array('label' => 'Relationship')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('emergency2_home_phone', array('label' => 'Home Phone')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('emergency2_work_phone', array('label' => 'Work Phone')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('emergency2_cell_phone', array('label' => 'Cell Phone')); ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?php echo $this->Form->input('emergency2_street_address', array('label' => 'Street Address', 'style' => 'width: 250px')); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('emergency2_city', array('label' => 'City')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('emergency2_state', array('label' => 'State')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('emergency2_zip', array('label' => 'Zip')); ?>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td colspan="2">
                    <?php echo $this->Form->input('allergies'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('date'); ?>
                </td>
            </tr>

        </table>
    </fieldset>
    <div>
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

<div class="organizations form">
    <?php echo $this->Form->create('Organization'); ?>
    <fieldset>
        <legend><?php echo __('Edit Organization'); ?></legend>
        <table>
            <tr>
                <td>
                    <?php echo $this->Form->input('org_name'); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('org_type'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('address_one'); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('address_two'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('city'); ?>
                </td>
                <td>
                        <?php
                        echo $this->Form->input('state', array('type' => 'select', 'empty' => true, 'options' => array(
                                'Alabama' => 'Alabama', 'Alaska' => 'Alaska', 'Arizona' => 'Arizona', 'Arkansas' => 'Arkansas', 'California' => 'California',
                                'Colorado' => 'Colorado', 'Connecticut' => 'Connecticut', 'Delaware' => 'Delaware', 'Washington DC' => 'Washington DC', 'Florida' => 'Florida',
                                'Georgia' => 'Georgia', 'Hawaii' => 'Hawaii', 'Idaho' => 'Idaho', 'Illinois' => 'Illinois', 'Indiana' => 'Indiana',
                                'Iowa' => 'Iowa', 'Kansas' => 'Kansas', 'Kentucky' => 'Kentucky', 'Louisiana' => 'Louisiana', 'Maine' => 'Maine',
                                'Maryland' => 'Maryland', 'Massachusetts' => 'Massachusetts', 'Michigan' => 'Michigan', 'Minnesota' => 'Minnesota', 'Mississippi' => 'Mississippi',
                                'Missouri' => 'Missouri', 'Montana' => 'Montana', 'Nebraska' => 'Nebraska', 'Nevada' => 'Nevada', 'New Hampshire' => 'New Hampshire',
                                'New Jersey' => 'New Jersey', 'New Mexico' => 'New Mexico', 'New York' => 'New York', 'North Carolina' => 'North Carolina', 'North Dakota' => 'North Dakota',
                                'Ohio' => 'Ohio', 'Oklahoma' => 'Oklahoma', 'Oregon' => 'Oregon', 'Pennsylvania' => 'Pennsylvania', 'Rhode Island' => 'Rhode Island',
                                'South Carolina' => 'South Carolina', 'South Dakota' => 'South Dakota', 'Tennessee' => 'Tennessee', 'Texas' => 'Texas', 'Utah' => 'Utah', 'Vermont' => 'Vermont',
                                'Virginia' => 'VA', 'Washington' => 'Washington', 'West Virginia' => 'West Virginia', 'Wisconsin' => 'Wisconsin', 'Wyoming' => 'Wyoming',
                                'Puerto Rico' => 'Puerto Rico', 'Other' => 'Other'
                                )));
                        ?>
                    </td>
                <td>
                    <?php echo $this->Form->input('zip'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('contact'); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('website'); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $this->Form->input('phone', array('type' => 'text')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('phone_cell', array('type' => 'text')); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('phone_office', array('type' => 'text')); ?>
                </td>
            </tr>
        </table>
    </fieldset>
    <div>
        <?php echo $this->Form->submit(__('Save and Edit a Resource for this Organization'), array('name' => 'addMore', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="actionsNoButton">

        <?php echo $this->Html->link(__('Organization Listing'), array('action' => 'index')); ?><br />
        <?php echo $this->Html->link(__('Resource Listing'), array('controller' => 'resources', 'action' => 'index')); ?><br />
        <?php echo $this->Html->link(__('Create a Resource for this Organization'), array('controller' => 'resources', 'action' => 'add')); ?> <br />
        <?php echo $this->Html->link(__('List Users for this Organization'), array('controller' => 'users', 'action' => 'index')); ?> <br />
        <?php echo $this->Html->link(__('Create a new User'), array('controller' => 'users', 'action' => 'add')); ?>
    
</div>

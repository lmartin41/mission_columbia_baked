<div class="actionsNoButton">

        <?php echo $this->Form->postLink(__('Delete this Resource'), array('action' => 
            'delete', $this->Form->value('Resource.id')), null, __('Are you sure you want to delete %s?', 
                    $this->Form->value('Resource.resource_name'))); ?><br />
       <?php echo $this->Html->link(__('Resource Listing'), array('action' => 'index')); ?><br />
    
</div>
<div class="resources form">
    <?php echo $this->Form->create('Resource'); ?>
    <fieldset>
        <legend><?php echo __('Edit Resource'); ?></legend>
        <?php
        echo $this->Form->input('resource_name');
        echo $this->Form->input('description');
        echo $this->Form->input('inventory');
        echo $this->Form->input('resource_status');
        echo $this->Form->input('street_address');
        ?>
        <table>
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
        </table>
        
        
    </fieldset>
    <div>
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>

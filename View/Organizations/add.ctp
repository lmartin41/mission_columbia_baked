<div class="organizations form">
    <?php echo $this->Form->create('Organization'); ?>
    <fieldset>
        <legend><?php echo __('Add Organization'); ?></legend>
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
                    <?php echo $this->Form->input('state'); ?>
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
                    <?php echo $this->Form->input('phone'); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('phone_cell'); ?>
                </td>
                <td>
                    <?php echo $this->Form->input('phone_office'); ?>
                </td>
            </tr>
        </table>
    </fieldset>
    <div>
        <?php echo $this->Form->submit(__('Save and Add a Resource for this Organization'), array('name' => 'addMore', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Done', array('name' => 'finished', 'div' => false)); ?>
        &nbsp;
        <?php echo $this->Form->submit('Cancel', array('name' => 'cancel', 'div' => false)); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('Organization Listing'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('Resource Listing'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Create a Resource for this Organization'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users for this Organization'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('Create a new User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>

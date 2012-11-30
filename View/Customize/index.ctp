<div class="customize index no-border">
    <?php echo $this->Html->link(__('Customize Tips'), array('controller' => 'tips', 'action' => 'index')); ?>
    <br /><br />
    <?php echo $this->Html->link('Custom Fields for My Organization', array('controller' => 'fields', 'action' => 'index')); ?>
    <br /><br />
    <?php echo $this->Html->link('Custom Labels for My Organization', array('controller' => 'lookups', 'action' => 'index')); ?>
    <br /><br />
    <?php if ($current_user['isSuperAdmin']): echo $this->Html->link('Resource Types', array('controller' => 'ResourceTypes', 'action' => 'index')); ?><?php endif; ?>
    <br/>
    <br/>
    <?php
    if (isset($options['georgia_tech_ssl_documentation'])) {
        if ($options['georgia_tech_ssl_documentation'] == false) {
            echo $this->Html->link('Turn Georgia Tech SSL Documentation On', array('action' => 'index', '?' => array('doc' => 'on')));
        } else {
            echo $this->Html->link('Turn Georgia Tech SSL Documentation Off', array('action' => 'index', '?' => array('doc' => 'off')));
        }
    }
    ?>
</div>
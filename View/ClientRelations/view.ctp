<div class="actionsNoButton">

        <?php echo $this->Html->link(__('Clients Listing'), array('controller' => 'clients', 'action' => 'index')); ?><br />
        <?php echo $this->Html->link(__('Relatives Listing'), array('action' => 'index', $clientRelation['ClientRelation']['client_id'])); ?><br />
        <?php echo $this->Html->link(__('Edit this Relative'), array('action' => 'edit', $clientRelation['ClientRelation']['id'], $clientRelation['ClientRelation']['client_id'])); ?><br />
        <?php echo $this->Form->postLink(__('Delete This Relative'), array('action' => 'delete', $clientRelation['ClientRelation']['id'], $clientRelation['ClientRelation']['client_id']), null, __('Are you sure you want to delete %s?', $clientRelation['ClientRelation']['first_name'])); ?><br />
        <?php echo $this->Html->link(__('Create a new Relative'), array('action' => 'add')); ?>
    
</div>

<div class="clientRelations view">
    <h2><?php echo __('Client Relation'); ?></h2>
    <dl>
        <dt><?php echo __('First Name'); ?></dt>
        <dd>
            <?php echo h($clientRelation['ClientRelation']['first_name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Last Name'); ?></dt>
        <dd>
            <?php echo h($clientRelation['ClientRelation']['last_name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Relationship'); ?></dt>
        <dd>
            <?php echo h($clientRelation['ClientRelation']['relationship']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('DOB'); ?></dt>
        <dd>
            <?php echo h($clientRelation['ClientRelation']['DOB']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Sex'); ?></dt>
        <dd>
            <?php echo h($clientRelation['ClientRelation']['sex']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Is Verified?'); ?></dt>
        <dd>
            <?php echo h($clientRelation['ClientRelation']['isVerified']) ? 'true' : 'false'; ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Validation Used'); ?></dt>
        <dd>
            <?php echo h($clientRelation['ClientRelation']['whatVerification']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($clientRelation['ClientRelation']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($clientRelation['ClientRelation']['modified']); ?>
            &nbsp;
        </dd>
    </dl>
</div>


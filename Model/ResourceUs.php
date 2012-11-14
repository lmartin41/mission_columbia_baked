<?php

App::uses('AppModel', 'Model');

/**
 * ResourceUs Model
 *
 * @property Client $Client
 * @property Resource $Resource
 */
class ResourceUs extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'resource_id';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'date' => array(
            'datetime' => array(
                'rule' => array('datetime'),
                'message' => 'Please enter a Date',
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Client' => array(
            'className' => 'Client',
            'foreignKey' => 'client_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Resource' => array(
            'className' => 'Resource',
            'foreignKey' => 'resource_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}

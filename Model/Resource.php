<?php

App::uses('AppModel', 'Model');

/**
 * Resource Model
 *
 * @property Organization $Organization
 * @property ResourceUs $ResourceUs
 */
class Resource extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'resource_name';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'resource_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Resource Name should not be Empty',
            ),
            'alphanumeric' => array(
                'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
                'message' => 'Resource Name should be alphanumeric',
            )
        ),
        'resource_status' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Resource Status Should not be Empty',
            ),
            'alphanumeric' => array(
                'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
                'message' => 'Resource Status Should be Alphanumeric',
            )
        )
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Organization' => array(
            'className' => 'Organization',
            'foreignKey' => 'organization_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'ResourceUs' => array(
            'className' => 'ResourceUs',
            'foreignKey' => 'resource_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}

<?php

App::uses('AppModel', 'Model');

/**
 * ResourceType Model
 *
 */
class ResourceType extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';
    public $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Name Should Not Be Empty',
            ),
            'alphanumeric' => array(
                'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
                'message' => 'Name Should be Alphanumeric',
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'message' => 'Name Should be Unique',
                'on' => 'create'
            ),
        )
    );
    public $hasMany = array(
        'resource' => array(
            'className' => 'resource',
            'foreignKey' => 'resource_type_id',
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

<?php

App::uses('AppModel', 'Model');

/**
 * Field Model
 *
 * @property Organization $Organization
 */
class Field extends AppModel {
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
    public $validate = array(
        'table_ref' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Reference Should Not Be Empty',
            ),
        ),
        'field_type' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Type Should Not Be Empty',
            ),
        ),
    );
    public $hasMany = array(
        'FieldInstance' => array(
            'className' => 'FieldInstance',
            'foreignKey' => 'fields_id',
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

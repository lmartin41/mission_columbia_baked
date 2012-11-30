<?php

App::uses('AppModel', 'Model');

/**
 * FieldInstance Model
 *
 * @property Fields $Fields
 */
class FieldInstance extends AppModel {
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Fields' => array(
            'className' => 'Fields',
            'foreignKey' => 'fields_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}

<?php

App::uses('AppModel', 'Model');

/**
 * Feedback Model
 *
 * @property User $User
 */
class Feedback extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'user_id';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'feedback' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Your feedback should not be empty',
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
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}

<?php

App::uses('AppModel', 'Model');

/**
 * VolunteerInformationForm Model
 *
 * @property User $User
 */
class VolunteerInformationForm extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'volunteer_information_form';

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'id';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'first_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter a First Name'
            ),
        ),
        'last_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter a last name',
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

<?php

App::uses('AppModel', 'Model');

/**
 * Organization Model
 *
 * @property Resource $Resource
 * @property User $User
 */
class Organization extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'org_name';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'org_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Organization Name Should Not Be Empty',
            ),
            'alphanumeric' => array(
                'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
                'message' => 'Organization Name Should be Alphanumeric',
            ),
        ),
        'org_type' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Organization Type Should Not be Empty',
            ),
            'alphanumeric' => array(
                'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
                'message' => 'Organization Type Should be Alphanumeric',
            ),
        ),
        'address_one' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Address Field Should not be Empty',
            ),
            'alphanumeric' => array(
                'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
                'message' => 'Address Field Should be Alphanumeric',
            ),
        ),
        'city' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'City Field Should not Be Empty',
            ),
            'alphanumeric' => array(
                'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
                'message' => 'City Field Should be Alphanumeric',
            ),
        ),
        'state' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'State Field Should not be Empty',
            ),
        ),
        'zip' => array(
            'postal' => array(
                'rule' => array('postal'),
                'message' => 'Please enter Zip in Zip Code Format',
            )
        ),
        'contact' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => "Organization's Contact Should not be Empty"
            ),
            'alphanumeric' => array(
                'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
                'message' => 'Contact Field Should be Alphanumeric',
            ),
        ),
        'phone' => array(
            'phone' => array(
                'rule' => array('phone'),
                'message' => 'Please enter phone numberi in Phone format',
            ),
        ),
        'phone_cell' => array(
            'phone' => array(
                'rule' => array('phone'),
                'message' => "If you'd like to enter a cell phone, then it should be in phone format",
                'allowEmpty' => true
            ),
        ),
        'phone_office' => array(
        'phone' => array(
                'rule' => array('phone'),
                'message' => "If you'd like to enter an office phone number, then it should be in phone format",
                'allowEmpty' => true
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Resource' => array(
            'className' => 'Resource',
            'foreignKey' => 'organization_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'organization_id',
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

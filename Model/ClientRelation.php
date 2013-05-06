<?php

App::uses('AppModel', 'Model');

/**
 * ClientRelation Model
 *
 * @property Client $Client
 */
class ClientRelation extends AppModel {

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
                'message' => 'Please enter a first name',
            ),
            'alphaNumeric' => array(
                'rule' => array('custom', '/^[A-Za-z\.\'-]*$/i'),
                'message' => 'Letters, apostrophes, dashes and periods are the only characters allowed for first names',
            ),
        ),
        'last_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Plese enter a last name',
            ),
            'alphaNumeric' => array(
              'rule' => array('custom', '/^[A-Za-z \.\'-]*$/i'),
                'message' => 'Letters, apostrophes, dashes and periods are the only characters allowed for last names',
           ),
        ),
        'relationship' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please specify how this person is related to the client',
            ),
            'alphanumeric' => array(
                'rule' => array('alphanumeric'),
                'message' => 'This field should be alphanumeric',
            ),
        ),
        'DOB' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Plese enter a date of birth or age',
            ),
        ),
        'sex' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please select either Male or Female',
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
        )
    );

}

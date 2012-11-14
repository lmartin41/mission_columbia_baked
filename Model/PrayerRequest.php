<?php

App::uses('AppModel', 'Model');

/**
 * PrayerRequest Model
 *
 * @property Client $Client
 */
class PrayerRequest extends AppModel {

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
        'date' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter a date',
            ),
        ),
        'request' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter a request',
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

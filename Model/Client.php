<?php

App::uses('AppModel', 'Model');

/**
 * Client Model
 *
 * @property ClientRelation $ClientRelation
 * @property ResourceUs $ResourceUs
 */
class Client extends AppModel {

    var $name = 'Client';

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
                'message' => "Please enter a first name",
            ),
            'alphaNumeric' => array(
                'rule' => array('custom', '/^[A-Za-z \.\'-]*$/i'),
                'message' => 'Letters, apostrophes, dashes and periods are the only characters allowed for first names',
            ),
        ),
        'last_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter a last name',
            ),
          'alphaNumeric' => array(
              'rule' => array('custom', '/^[A-Za-z \.\'-]*$/i'),
                'message' => 'Letters, apostrophes, dashes and periods are the only characters allowed for last names',
           ),
        ),
        'DOB' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter a Date of Birth or Age',
            ),
        ),
        'sex' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please select male or female',
            ),
        ),
        'phone' => array(
            'notempty' => array(
                'rule' => array('phone'),
                'message' => 'Please enter in a phone number',
                'allowEmpty' => true
            ),
        ),
        'when_next_check' => array(
            'validDate' => array(
                'rule' => 'futureDate',
                'message' => 'Theoretically, this date should be in the future',
                'allowEmpty' => true
            )
        )
    );

    public function futureDate($data) {
        if (strtotime($data['when_next_check']) < strtotime(date('Y-m-d'))) {
            $this->invalidate();
        }
        else
            return true;
    }

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'ClientRelation' => array(
            'className' => 'ClientRelation',
            'foreignKey' => 'client_id',
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
        'ResourceUs' => array(
            'className' => 'ResourceUs',
            'foreignKey' => 'client_id',
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
        'ClientChecklist' => array(
            'className' => 'ClientChecklist',
            'foreignKey' => 'client_id',
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
        'PrayerRequest' => array(
            'className' => 'PrayerRequest',
            'foreignKey' => 'client_id',
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

<?php

App::uses('AppModel', 'Model');

/**
 * ClientChecklist Model
 *
 * @property Client $Client
 * @property ClientChecklistTask $ClientChecklistTask
 */
class ClientChecklist extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'id';
    public $validate = array(
        'checklist_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Checklist Name Should not be Empty'
            ),
            'alphanumeric' => array(
                'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
                'message' => 'Checklist Name should be Alphanumeric'
            )
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

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'ClientChecklistTask' => array(
            'className' => 'ClientChecklistTask',
            'foreignKey' => 'client_checklist_id',
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

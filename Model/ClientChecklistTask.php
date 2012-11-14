<?php

App::uses('AppModel', 'Model');

/**
 * ClientChecklistTask Model
 *
 * @property ClientChecklist $ClientChecklist
 */
class ClientChecklistTask extends AppModel {

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
        'task_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Task Name Should not be Empty',
            ),
        ),
        'task_description' => array(
            'notempty' => array(
                'rule' => array('custom', '/^[a-z0-9 ]*$/i'),
                'message' => 'Task Name should be Alphanumeric',
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
        'ClientChecklist' => array(
            'className' => 'ClientChecklist',
            'foreignKey' => 'client_checklist_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}

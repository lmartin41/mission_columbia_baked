<?php
App::uses('AppModel', 'Model');
/**
 * Tip Model
 *
 * @property Organization $Organization
 */
class Tip extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'controller';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'organization_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'You must provide some input.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		'controller' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'A controller must have some value',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alpha' => array(
				'rule' => '/^[A-Za-z]*$/',
				'message' => "A controller can only contain letters."
			)
		),
		'view' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'A view must have some value.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alpha' => array(
					'rule' => '/^[A-Za-z]*$/',
					'message' => "A view can only contain letters."
			)
		),
		'tip' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'No tip provided. To remove a tip click the hide link.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
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
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

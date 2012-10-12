<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Organization $Organization
 * @property Feedback $Feedback
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';
	public $findMethods = array('active' => true);
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter a username',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Your username should be a combination of letters/numbers',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'This username has already been taken',
				'on' => 'create'
			)
		),
		'password' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Your password should be a combination of letters/numbers',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please enter your password',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
            'matchPasswords' => array(
            	'rule' => 'matchPasswords',
                'message' => 'Your passwords do not match',
                //'on' => 'create'
            )
		),
        'password_confirmation' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Your password confirmation should be a combination of letters/numbers',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Please confirm your password',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Please enter your email in example@example.com format',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
        
        /**
         * Lee: Custom match passwords validation method
         * 
         * @param type $data
         * @return boolean 
         */
        public function matchPasswords($data) {
            if ($data['password'] == $this->data['User']['password_confirmation']) {
                return true;
            }
            $this->invalidate('password_confirmation', 'Your passwords do not match');
            return false;
        }
        
        /**
         * Lee: callback function for encrypting passwords 
         */
        public function beforeSave($options = array()) {
            if (isset($this->data['User']['password'])) {
                $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
            }
            return true;
        }

        public function organizationDisabled($user)
        {
        	if( !$user['isSuperAdmin'] )
        		return 'disabled';
        	else
        		return NULL;
        }
        protected function _findActive($state, $query, $results = array())
        {
        	if( $state == 'before' )
        	{
        		$cur_user = $query['conditions']['cur_user'];
        		unset($query['conditions']['cur_user']);
        		$query['conditions']['User.isDeleted'] = 0;
        		if( !$cur_user['isSuperAdmin'] )
        			$query['conditions']['Organization.id'] = $cur_user['organization_id'];
        		
        		return $query;
        	}
        	
        	return $results;
        }
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

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Feedback' => array(
			'className' => 'Feedback',
			'foreignKey' => 'user_id',
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

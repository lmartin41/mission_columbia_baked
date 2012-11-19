<?php
App::uses('Tip', 'Model');

/**
 * Tip Test Case
 *
 */
class TipTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tip',
		'app.organization',
		'app.resource',
		'app.resource_us',
		'app.client',
		'app.client_relation',
		'app.client_checklist',
		'app.client_checklist_task',
		'app.prayer_request',
		'app.user',
		'app.feedback',
		'app.volunteer_information_form'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tip = ClassRegistry::init('Tip');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tip);

		parent::tearDown();
	}

}

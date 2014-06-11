<?php
App::uses('Parte', 'Model');

/**
 * Parte Test Case
 *
 */
class ParteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.parte',
		'app.tipoparte',
		'app.valoresdefecto',
		'app.tipocampo',
		'app.tipocampos_tipoparte',
		'app.incidencia',
		'app.usuario',
		'app.role',
		'app.entero',
		'app.workflowpaso',
		'app.float',
		'app.texto'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Parte = ClassRegistry::init('Parte');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Parte);

		parent::tearDown();
	}

}

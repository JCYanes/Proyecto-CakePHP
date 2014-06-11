<?php
/**
 * ParteFixture
 *
 */
class ParteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'firmado' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'validado' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'usuario_vendedor' => array('type' => 'integer', 'null' => false, 'default' => null),
		'usuario_gestor' => array('type' => 'integer', 'null' => true, 'default' => null),
		'tipoparte_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'incidencia_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'firmado' => 1,
			'validado' => 1,
			'created' => '2014-05-29 14:34:31',
			'usuario_vendedor' => 1,
			'usuario_gestor' => 1,
			'tipoparte_id' => 1,
			'incidencia_id' => 1
		),
	);

}

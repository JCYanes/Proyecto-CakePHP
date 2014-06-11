<?php
App::uses('AppModel', 'Model');
/**
 * Parte Model
 *
 * @property Tipoparte $Tipoparte
 * @property Incidencia $Incidencia
 * @property Usuario $vendedor
 * @property Usuario $gerente
 * @property Entero $Entero
 * @property Float $Float
 * @property Texto $Texto
 */
class Parte extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Tipoparte' => array(
			'className' => 'Tipoparte',
			'foreignKey' => 'tipoparte_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Incidencia' => array(
			'className' => 'Incidencia',
			'foreignKey' => 'incidencia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuariovendedor',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Usuario' => array(
			'className' => 'Usuario',
			'foreignKey' => 'usuariogestor',
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
		'Entero' => array(
			'className' => 'Entero',
			'foreignKey' => 'parte_id',
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
		'Float' => array(
			'className' => 'Float',
			'foreignKey' => 'parte_id',
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
		'Texto' => array(
			'className' => 'Texto',
			'foreignKey' => 'parte_id',
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

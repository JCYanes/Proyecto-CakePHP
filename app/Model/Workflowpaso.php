<?php
App::uses('AppModel', 'Model');
/**
 * Workflowpaso Model
 *
 * @property Entero $Entero
 * @property Float $Float
 * @property Texto $Texto
 */
class Workflowpaso extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Entero' => array(
			'className' => 'Entero',
			'foreignKey' => 'workflowpaso_id',
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
			'foreignKey' => 'workflowpaso_id',
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
			'foreignKey' => 'workflowpaso_id',
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

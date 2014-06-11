<?php
App::uses('AppModel', 'Model');
/**
 * Texto Model
 *
 * @property Parte $Parte
 * @property Workflowpaso $Workflowpaso
 * @property TipocamposTipoparte $TipocamposTipoparte
 */
class Texto extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Parte' => array(
			'className' => 'Parte',
			'foreignKey' => 'parte_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Workflowpaso' => array(
			'className' => 'Workflowpaso',
			'foreignKey' => 'workflowpaso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TipocamposTipoparte' => array(
			'className' => 'TipocamposTipoparte',
			'foreignKey' => 'tipocampos_tipoparte_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
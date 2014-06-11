<?php
App::uses('AppModel', 'Model');
/**
 * Float Model
 *
 * @property Parte $Parte
 * @property Workflowpaso $Workflowpaso
 * @property TipocamposTipoparte $TipocamposTipoparte
 */
class Float extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'contenido' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
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

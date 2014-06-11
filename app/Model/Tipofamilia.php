<?php
App::uses('AppModel', 'Model');
/**
 * Tipofamilia Model
 *
 * @property TipocamposTipoparte $TipocamposTipoparte
 */
class Tipofamilia extends AppModel {

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
		'TipocamposTipoparte' => array(
			'className' => 'TipocamposTipoparte',
			'foreignKey' => 'tipofamilia_id',
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

<?php
App::uses('AppModel', 'Model');
/**
 * Tipocampo Model
 *
 * @property Tipoparte $Tipoparte
 */
class Tipocampo extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Tipoparte' => array(
			'className' => 'Tipoparte',
			'joinTable' => 'tipocampos_tipopartes',
			'foreignKey' => 'tipocampo_id',
			'associationForeignKey' => 'tipoparte_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
	
	function obtenername($id)
	{
	  
	  $datos = $this->query("SELECT name FROM tipocampos WHERE id=$id");
	  return $this->getQueryResult($datos);
	}
	
	
	// getQueryResult: devuelve el primer valor de la consulta realizada
	// Parámetros: hay que pasarle un array (devuelto por una consulta sql
	function getQueryResult($datos){
	  foreach($datos[0] as $dato){
	    foreach($dato as $d){
		return $d;	// devuelve el primer valor de la consulta realizada       
	    }
	  }
	  
	}

}

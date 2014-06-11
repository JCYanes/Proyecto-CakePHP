<?php
App::uses('AppModel', 'Model');
/**
 * Valoresdefecto Model
 *
 * @property Tipoparte $Tipoparte
 */
class Valoresdefecto extends AppModel {


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
		)
	);
	
	function obtenervalor()
	{
	  
	  $datos = $this->query("SELECT tipoparte_id FROM valoresdefectos");
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

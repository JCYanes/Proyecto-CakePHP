<?php
/**
*	Copyright (C) 2014 Jésica Carballo Yanes
*
*    This program is free software: you can redistribute it and/or modify
*    it under the terms of the GNU Affero General Public License as
*    published by the Free Software Foundation, either version 3 of the
*    License, or (at your option) any later version.
*
*    This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*    GNU Affero General Public License for more details.
*
*    You should have received a copy of the GNU Affero General Public License
*   along with this program.  If not, see <http://www.gnu.org/licenses/>.
**/
 ?>
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

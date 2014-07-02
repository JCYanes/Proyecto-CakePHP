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

	function obtenerfamilia($id){
		$datos= $this->query("SELECT name FROM tipofamilias WHERE id=$id");
		return $this->getResult($datos);
	}
	// getQueryResult: devuelve el primer valor de la consulta realizada
	// Parámetros: hay que pasarle un array (devuelto por una consulta sql
	function getResult($datos){
		foreach($datos[0] as $dato){
			foreach($dato as $d){
				return $d;	// devuelve el primer valor de la consulta realizada       
	    }
	  }
	  
	}
	
}

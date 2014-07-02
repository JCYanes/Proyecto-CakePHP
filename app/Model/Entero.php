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
 * Entero Model
 *
 * @property Parte $Parte
 * @property Workflowpaso $Workflowpaso
 * @property TipocamposTipoparte $TipocamposTipoparte
 */
class Entero extends AppModel {

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
	
	function obtenerdatos($idparte,$tipo)
	{
		 return $datos = $this->query("SELECT * FROM `enteros` WHERE `parte_id`=$idparte AND `tipocampos_tipoparte_id`=$tipo");

	}
	function obtenerlistatipos ($idparte,$workflow){
	 return $datos = $this->query("SELECT `id`,`tipocampos_tipoparte_id` FROM `enteros` WHERE `parte_id`=$idparte AND `workflowpaso_id`=$workflow");
	}
	function obtenertodotipos ($idparte){
		return $datos = $this->query("SELECT `id`,`tipocampos_tipoparte_id` FROM `enteros` WHERE `parte_id`=$idparte");
	}

		   


}

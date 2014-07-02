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
App::uses('AppModel', 'Model');
/**
 * Parte Model
 *
 * @property Tipoparte $Tipoparte
 * @property Incidencia $Incidencia
 * @property Usuario $vendedor
 * @property Usuario $gerente
 * @property Entero $Entero
 * @property Reale $Reale
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'usuariovendedor',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
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
		'Reale' => array(
			'className' => 'Reale',
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
	
	
	public function isOwnedBy($parte, $user) {
	    return $this->field('id', array('id' => $parte, 'usuariovendedor' => $user)) !== false;
	}
	

}

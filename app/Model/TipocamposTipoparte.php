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
 * TipocamposTipoparte Model
 *
 * @property Tipoparte $Tipoparte
 * @property Tipocampo $Tipocampo
 * @property Tipofamilia $Tipofamilia
 * @property Entero $Entero
 * @property Float $Float
 * @property Texto $Texto
 */
class TipocamposTipoparte extends AppModel {


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
		'Tipocampo' => array(
			'className' => 'Tipocampo',
			'foreignKey' => 'tipocampo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipofamilia' => array(
			'className' => 'Tipofamilia',
			'foreignKey' => 'tipofamilia_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Categoria' => array(
			'className' => 'Categoria',
			'foreignKey' => 'categoria_id',
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
			'foreignKey' => 'tipocampos_tipoparte_id',
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
			'foreignKey' => 'tipocampos_tipoparte_id',
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
			'foreignKey' => 'tipocampos_tipoparte_id',
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
	
	/**
	Funcion para obtener los campos que pertenezcan a un determinado formato
	**/
	function obtenercamposformato ($idtipoparte){ 
	   return $datos = $this->query("SELECT id,tipocampo_id,tipofamilia_id, categoria_id FROM tipocampos_tipopartes WHERE tipoparte_id=$idtipoparte" );
	}
	
	function obtenercamposfamilia($idtipoparte,$idfamilia){
		return $datos = $this->query("SELECT id FROM tipocampos_tipopartes AS TipocamposTipoparte WHERE tipoparte_id=$idtipoparte AND tipofamilia_id = $idfamilia");
	}
	
	function obtenerfamilias($idtipoparte){
		return $datos= $this->query("SELECT tipofamilia_id FROM tipocampos_tipopartes where tipoparte_id=$idtipoparte group by tipofamilia_id");
	}
	
	function listarelementos($idtipoparte,$idfamilia){
		return $datos= $this->query("SELECT id FROM tipocampos_tipopartes AS tipocampos_tipoparte WHERE tipoparte_id=$idtipoparte AND tipofamilia_id= $idfamilia ORDER BY orden");
	}
	function obteneridcampo($id){
		$datos = $this->query("SELECT tipocampo_id FROM tipocampos_tipopartes AS tipocampos_tipoparte WHERE id=$id");
		return $datos;
	}
	

}

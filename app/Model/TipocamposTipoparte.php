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
		'Float' => array(
			'className' => 'Float',
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
	/*function obtenercamposformato ($idtipoparte){ 
	   return $datos = $this->query("SELECT id,tipocampo_id,tipofamilia_id, categoria_id FROM tipocampos_tipopartes WHERE tipoparte_id=$idtipoparte" );
	}
	
	function obtenercamposfamilia($idtipoparte,$idfamilia){
	return $datos = $this->query("SELECT id FROM tipocampos_tipopartes AS TipocamposTipoparte WHERE tipoparte_id=$idtipoparte AND tipofamilia_id = $idfamilia");
	}*/
	
	function obtenerid($datos){
		foreach($datos[0] as $dato){
			foreach($dato as $d){
				return $d;	// devuelve el primer valor de la consulta realizada       
			}
		}
	}
	
	function obtenerfamilias($idtipoparte){
		return $datos= $this->query("SELECT tipofamilia_id FROM tipocampos_tipopartes where tipoparte_id=".$idtipoparte." group by tipofamilia_id");
	}
	
	function listarelementos($idtipoparte,$idfamilia){
		return $datos= $this->query("SELECT id FROM tipocampos_tipopartes AS tipocampos_tipoparte WHERE tipoparte_id=".$idtipoparte." AND tipofamilia_id=".$idfamilia." ORDER BY orden");
	}
	function obteneridcampo($id){
		$datos = $this->query("SELECT tipocampo_id FROM tipocampos_tipopartes WHERE `id`=".$id);
		return $this->obtenerid($datos);
	}
	
	
	
	

}

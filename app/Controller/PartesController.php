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
App::uses('AppController', 'Controller','Auth');
/**
 * Partes Controller
 *
 * @property Parte $Parte
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PartesController extends AppController {

    public $name = 'Partes';

   //Componentes
    public $components = array('Paginator', 'Session');
    public $uses = array('Parte','Valoresdefecto','Categoria','TipocamposTipoparte','User','Tipofamilia','Tipocampo','Reale','Entero','Texto');
    
    
    
    public function isAuthorized($user) {
      // All registered users can add partes
      if (in_array($this->action, array('index','nuevoparte','view'))) {
	  return true;
      }

      // Sólo el vendedor puede editar y firmar el parte
      if (in_array($this->action, array('editvendedor', 'firmar'))) {
	  $postId = (int) $this->request->params['pass'][0];
	  if ($this->Parte->isOwnedBy($postId, $user['id'])) {
	      return true;
	  }
	  else{
	  return false;
	  }
      }

      return parent::isAuthorized($user);
    }
    

	
    public function index() {
    $usuarioid=$this->Session->read('Usuario.id');
    $tiporol = $this->Auth->user('role_id');
     
     if ($tiporol == 3){//Si es vendedor
	  $this->Paginator->settings = array(
	      'conditions' => array('Parte.usuariovendedor'=> $usuarioid),
	      'limit' => 10,
	  );
	  
      }elseif($tiporol == 2){//Si es gerente
	 $this->Paginator->settings = array(
	      'limit' => 10,
	  );
	  
      }else{
      
	  $this->Paginator->settings = array(
	      'limit' => 10,
	  );
	
      }
	  $data = $this->Paginator->paginate();
	  $this->set('partes',$data);
	  $this->set('tiporol',$tiporol);
      }
	
    public function view($id = null) {
	    if (!$this->Parte->exists($id)) {
		    throw new NotFoundException(__('Id parte incorrecto'));
	    }
	    $options = array('conditions' => array('Parte.' . $this->Parte->primaryKey => $id));
	    $this->set('parte', $this->Parte->find('first', $options));
    }
    
	/**
	Inicializamos las tablas que almacenaran los valores
	**/
	
	public function inicializar($idtipo, $cat_id, $newParteId, $workFlow,$tipocampo){
	    
	    $categoria = $this->Categoria->obtenervalor($cat_id);
	    $campo = $this->Tipocampo->obtenername($tipocampo);
	    $this->requestAction('/'.$categoria.'/add/'.$newParteId.'/'.$workFlow.'/'.$idtipo.'/'.$campo); 
	}
	


	/**
	Creacion de un nuevo parte
	**/
	
	public function nuevoparte(){
	  $tipoparteid = $this->Valoresdefecto->obtenervalor(); //Obtiene el valor guardado por defecto del formulario a usar.
	  $usuario=$this->Auth->User('id');
	  $workflow = 1; //Primera fase inicializamos el workflow a 1
	  $this->Parte->create();
	  $this->Parte->save();//guardamos un parte en blanco
	  $newParteId = $this->Parte->id;

	  //crear todo el esqueleto para almacenar datos
	  
	  $data= array('id' => $newParteId,'tipoparte_id'=> $tipoparteid,'usuariovendedor'=>$usuario,'incidencia_id'=>'1');
	  
	  // Por cada elemento que contenga el formato de parte creamos los campos
	  
	  $camposparte = $this->TipocamposTipoparte->obtenercamposformato($tipoparteid); 
	  //recorrer cada uno de estos campos y por cada uno obtener la categoria y crear un nuevo
	  foreach($camposparte as $dato){
	    foreach($dato as $d){
		$this->inicializar($d['id'], $d['categoria_id'],$newParteId,$workflow,$d['tipocampo_id']); //recorremos por categoria e id y creamos 
	    }
	  }
	   
	  if ($this->Parte->saveAll($data)) { 
	    $this->Session->setFlash(__('El parte ha sido creado.'));
	    //return $this->redirect(array('action' => 'index'));
		    
	  } else {
		    $this->Session->setFlash(__('El parte no ha podido ser creado intentelo de nuevo.'));
	  }
	return $this->redirect(array('action' => 'index'));
	$this->autoRender = false;
    }
	
	/**
	 * Crea una copia de los registros del parte por si hay modificaciones
	 * 
	 * */ 
	 public function copiardatos($cat_id, $newParteId,$tipocampo,$idtipo){
		$categoria = $this->Categoria->obtenervalor($cat_id);
	    $campo = $this->Tipocampo->obtenername($tipocampo);
	    $this->requestAction('/'.$categoria.'/copiar/'.$newParteId.'/'.$idtipo); 
	    
	}
	
	/** Funcion para crear una copia de los registros parte actual para editarla o validarla
	 *  Asignamos un gestor a ese parte**/
	public function crearcopia($idparte=null){
	  $this->Parte->id=$idparte;
	 
	  if (!$this->Parte->exists($idparte)) {
			  throw new NotFoundException(('Invalido id de parte'));
	  }
	  $data = array('id' => $idparte,'copiado'=>1);
	  $this->request->allowMethod('post', 'crearcopia');//permitir el acceso
	  if ($this->Parte->save($data)) {
		 //Primero inicializamos los datos
		$tipoparteid = $this->Valoresdefecto->obtenervalor(); //Obtiene el valor guardado por defecto del formulario a usar.
		// Por cada elemento que contenga el formato 
		$camposparte = $this->TipocamposTipoparte->obtenercamposformato($tipoparteid); 
		//recorrer cada uno de estos campos y por cada uno obtener la categoria y COPIAR el contenido
		foreach($camposparte as $dato){
			foreach($dato as $d){
				 $this->copiardatos($d['categoria_id'],$idparte,$d['tipocampo_id'],$d['id']);
			}
		}
				$this->Session->setFlash(__('El parte ha sido creado para validar.'));
		} else {
				$this->Session->setFlash(__('No se ha podido validar intentelo de nuevo.'));
			}
	return $this->redirect(array('action' => 'index'));
	} 
	
	public function actualizar ($id){
		//AHORA TOCA EDITAR
		$this->layout='parte';
		$tipoparteid = $this->Valoresdefecto->obtenervalor(); //Obtiene el valor guardado por defecto del formulario a usar.
		$workflow = 2; //Segunda fase, validacion
		$tipofamilias=$this->TipocamposTipoparte->obtenerfamilias($tipoparteid);//Familias existentes en este parte
		$familias[]=array();
		$elementos[]=array();//Todos los elementos de cada familia
		$i=0;
		foreach($tipofamilias as $dato){
			foreach($dato as $d){
				$nombrefamilia= $this->Tipofamilia->obtenerfamilia($d['tipofamilia_id']);
				$familias[$i]=$nombrefamilia;
				$elementos[$i]=$this->TipocamposTipoparte->listarelementos($tipoparteid,$d['tipofamilia_id']);//guardamos un array con todos los elementos ordenados de cada familia
				
			}
			$i++;
		}
 
		$this->set('familias',$familias);
		$this->set('elementos',$elementos);//listado con los id ordenados
		$this->set('listadoReales',($this->Reale->obtenertodotipos ($id)));
		$this->set('listadoEnteros',($this->Entero->obtenertodotipos ($id)));
		$this->set('listadoTextos',($this->Texto->obtenertodotipos ($id)));
		
		
		
		$resultados= $this->Reale->obtenerlistatipos($id,$workflow);
		// Get "Reale" "tipocampos_tipoparte_id"
		foreach ($resultados as $resultado){
			foreach ($resultado as $r ){
				$listReale[] = $r['tipocampos_tipoparte_id'];
				$listIDReale[] =$r['id'];
				$datos=$this->TipocamposTipoparte->obteneridcampo($r['tipocampos_tipoparte_id']);
				foreach($datos as $dato){
					foreach($dato as $d){
						$listTipoReale[]= $d['tipocampo_id'];
					}
				}
			}
		}
		$resultados= $this->Entero->obtenerlistatipos ($id,$workflow );
		// Get "Entero" "tipocampos_tipoparte_id"
		foreach ($resultados as $resultado){
			foreach ($resultado as $r ){
				$listEntero[] = $r['tipocampos_tipoparte_id'];
				$listIDEntero[] =$r['id'];
				$datos=$this->TipocamposTipoparte->obteneridcampo($r['tipocampos_tipoparte_id']);
				foreach($datos as $dato){
					foreach($dato as $d){
						$listTipoEntero[]= $d['tipocampo_id'];
					}
				}
			}
		}
	
		$resultados= $this->Texto->obtenerlistatipos ($id,$workflow );
		// Get "Texto" "tipocampos_tipoparte_id"
		foreach ($resultados as $resultado){
			foreach ($resultado as $r ){
				$listTexto[] =  $r['tipocampos_tipoparte_id'];
				$listIDTexto[] =$r['id'];
				$datos=$this->TipocamposTipoparte->obteneridcampo( $r['tipocampos_tipoparte_id']);
				foreach($datos as $dato){
					foreach($dato as $d){
						$listTipoTexto[]= $d['tipocampo_id'];
					}
				}
			}
		}
		
		$this->set('listEntero',$listEntero);
		$this->set('listReale',$listReale);
		$this->set('listTexto',$listTexto);
		$this->set('listTipoEntero', $listTipoEntero);
		$this->set('listTipoReale', $listTipoReale);
		$this->set('listTipoTexto', $listTipoTexto);
		$this->set('listIDReale',$listIDReale);
		$this->set('listIDEntero',$listIDEntero);
		$this->set('listIDTexto',$listIDTexto);
		
			
		if (!$this->Parte->exists($id)) {
				throw new NotFoundException(__('Invalido parte'));
			}
		else{
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Parte->saveAll($this->request->data)) {
					$this->Session->setFlash(__('El parte ha sido actualizado.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('No se ha podido actualizar intentelo de nuevo.'));
				}
		}else {
			$options = array('conditions' => array('Parte.' . $this->Parte->primaryKey => $id));
			$this->request->data = $this->Parte->find('first', $options);
		}
	}

}
	
	/**Funcion que valida un parte para que pueda quedar cerrado
	 * al momento de validar se asigna un gerente a la validación
	 * */
	public function validar ($id = null){
	  $this->Parte->id=$id;
	   $usuariogestor=$this->Auth->User('id');
	  if (!$this->Parte->exists($id)) {
			  throw new NotFoundException(('Invalido id de parte'));
	  }
	  
	  $data = array('id' => $id, 'validado' => '1','usuariogestor'=>$usuariogestor);
	  
	  $this->request->allowMethod('post', 'validar');//permitir el acceso a validar
	  if ($this->Parte->save($data)) {
				$this->Session->setFlash(__('El parte ha sido validado.'));
			} else {
				$this->Session->setFlash(__('No se ha podido validar intentelo de nuevo.'));
	}
	return $this->redirect(array('action' => 'index'));
	}
    
    /**Funcion que permite editar un parte
     * Es limitada al vendedor que crea su parte
	 * */
    public function editvendedor($id = null) {
		$this->layout='parte';
		$workflow =1; //flujo de trabajo inicial
		$tipoparteid = $this->Valoresdefecto->obtenervalor(); //Obtiene el valor guardado por defecto del formulario a usar.
		$tipofamilias=$this->TipocamposTipoparte->obtenerfamilias($tipoparteid);//Familias existentes en este parte
		$familias[]=array();
		$elementos[]=array();//Todos los elementos de cada familia
		$i=0;
		foreach($tipofamilias as $dato){
			foreach($dato as $d){
				$nombrefamilia= $this->Tipofamilia->obtenerfamilia($d['tipofamilia_id']);
				$familias[$i]=$nombrefamilia;
				$elementos[$i]=$this->TipocamposTipoparte->listarelementos($tipoparteid,$d['tipofamilia_id']);//guardamos un array con todos los elementos ordenados de cada familia
				
			}
			$i++;
		}
 
		$this->set('familias',$familias);
		$this->set('elementos',$elementos);//listado con los id ordenados
		
		$resultados= $this->Reale->obtenerlistatipos ($id,$workflow );
		// Get "Reale" "tipocampos_tipoparte_id"
		foreach ($resultados as $resultado){
			foreach ($resultado as $r ){
				$listReale[] = $r['tipocampos_tipoparte_id'];
					$datos=$this->TipocamposTipoparte->obteneridcampo($r['tipocampos_tipoparte_id']);
					foreach($datos as $dato){
						foreach($dato as $d){
							$listTipoReale[]= $d['tipocampo_id'];
						}
					}
			}
		}
		$resultados= $this->Entero->obtenerlistatipos ($id,$workflow );
		// Get "Entero" "tipocampos_tipoparte_id"
		foreach ($resultados as $resultado){
			foreach ($resultado as $r ){
				$listEntero[] = $r['tipocampos_tipoparte_id'];
				$datos=$this->TipocamposTipoparte->obteneridcampo($r['tipocampos_tipoparte_id']);
				foreach($datos as $dato){
					foreach($dato as $d){
						$listTipoEntero[]= $d['tipocampo_id'];
					}
				}
			}
		}
	
		$resultados= $this->Texto->obtenerlistatipos ($id,$workflow );
		// Get "Texto" "tipocampos_tipoparte_id"
		foreach ($resultados as $resultado){
			foreach ($resultado as $r ){
				$listTexto[] =  $r['tipocampos_tipoparte_id'];
				$datos=$this->TipocamposTipoparte->obteneridcampo( $r['tipocampos_tipoparte_id']);
				foreach($datos as $dato){
					foreach($dato as $d){
						$listTipoTexto[]= $d['tipocampo_id'];
					}
				}
			}
		}
		
		$this->set('listEntero',$listEntero);
		$this->set('listReale',$listReale);
		$this->set('listTexto',$listTexto);
		$this->set('listTipoEntero', $listTipoEntero);
		$this->set('listTipoReale', $listTipoReale);
		$this->set('listTipoTexto', $listTipoTexto);
			
		if (!$this->Parte->exists($id)) {
				throw new NotFoundException(__('Invalido parte'));
			}
		else{
			if ($this->request->is(array('post', 'put'))) {
				if ($this->Parte->saveAll($this->request->data)) {
					$this->Session->setFlash(__('El parte ha sido actualizado.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('No se ha podido actualizar intentelo de nuevo.'));
				}
		}else {
			$options = array('conditions' => array('Parte.' . $this->Parte->primaryKey => $id));
			$this->request->data = $this->Parte->find('first', $options);
		}
	}

}
	
	 /**Funcion que firma un parte para que pueda ser validado por cualquier gestor
	 * */
	public function firmar ($id = null){
	  $this->Parte->id=$id;
	  
	  if (!$this->Parte->exists($id)) {
			  throw new NotFoundException(('Invalido id de parte'));
	  }
	  
	  $data = array('id' => $id, 'firmado' => '1');
	  
	  $this->request->allowMethod('post', 'firmar');//permitir el acceso a firmar
	  if ($this->Parte->save($data)) {
				$this->Session->setFlash(__('El parte ha sido firmado.'));
			} else {
				$this->Session->setFlash(__('No se ha podido firmar, intentelo de nuevo.'));
	}
	return $this->redirect(array('action' => 'index'));
	}
}


<?php
App::uses('AppController', 'Controller');
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
    public $uses = array('Parte','Valoresdefecto','Categoria','TipocamposTipoparte');
    
    
	
	public function indexvendedor() {
	
	      $this->Paginator->settings = array(
		  //'fields' => array('Parte.id', 'Parte.usuariovendedor',Parte.usuariovendedor),
		  'conditions' => array('Parte.usuariovendedor'=>'1'),
		  'limit' => 10,
	      );
	      $data = $this->Paginator->paginate();
	      $this->set('partes',$data);
	}
	
	public function viewvendedor($id = null) {
		if (!$this->Parte->exists($id)) {
			throw new NotFoundException(__('Id parte incorrecto'));
		}
		$options = array('conditions' => array('Parte.' . $this->Parte->primaryKey => $id));
		$this->set('parte', $this->Parte->find('first', $options));
	}
	
	
	public function editar($id) {
	  $this->requestAction('/Enteros/edit/'.$id.'/'); 
	}
	
	
	public function editvendedor($id = null) {
	$tipoparteid = $this->Valoresdefecto->obtenervalor(); //Obtiene el valor guardado por defecto del formulario a usar.
	
		
	if (!$this->Parte->exists($id)) {
			throw new NotFoundException(__('Invalido parte'));
		}
		
		$this->editar(2);
		if ($this->request->is(array('post', 'put'))) {
		
		      //Buscamos en la tabla enteros y sacamos el id de enteros con el parte relacionado

		/*$enteros = $this->request->data;
		
		$cont = 0;
		$num_campos = 0;
		foreach ($enteros['Entero'] as $entero){
		  foreach($entero as $e){
		    $num_campos = $num_campos + 1;
		  }
		  break;
		}

		
		foreach ($enteros['Entero'] as $entero){
		  foreach($entero as $e){
		    $array_enteros[] = $e;
		  }
		 $this->Entero->actualizar($array_enteros[$cont],$array_enteros[$cont+1],$array_enteros[$cont+2],$array_enteros[$cont+3],$array_enteros[$cont+4]);
		 $cont = $cont + $num_campos;
		}
		*/
		
			if ($this->Parte->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__('El parte ha sido actualizado.'));
				return $this->redirect(array('action' => 'indexvendedor'));
			} else {
				$this->Session->setFlash(__('No se ha podido actualizar intentelo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Parte.' . $this->Parte->primaryKey => $id));
			$this->request->data = $this->Parte->find('first', $options);
		}
		$usuariogestor = $this->Parte->Usuario->find('list',array('fields'=>'Usuario.id','Usuario.username'));
		
		$this->set(compact ('usuariogestor'));
		

	}
	
	/**
	Inicializamos las tablas que almacenaran los valores
	**/
	
	public function inicializar($id, $cat_id, $newParteId, $workFlow){
	    
	    $categoria = $this->Categoria->obtenervalor($cat_id);
// 	    //$campo = $this->Tipocampo->obtenername($idcampo);//el nombre del campo
	    if ($categoria == 'Entero'){
	      //add($idparte,$idworkflow,$idtipocampospartes) {
	       $this->requestAction('/Enteros/add/'.$newParteId.'/'.$workFlow.'/'.$id); 
	    }
	}
	
	/**
	Creacion de un nuevo parte
	**/
	
	
	public function nuevoparte(){
	  $tipoparteid = $this->Valoresdefecto->obtenervalor(); //Obtiene el valor guardado por defecto del formulario a usar.
	  if ($this->request->is('post')) {
	      $this->Parte->create();
	      
	      $this->Parte->save($this->request->data);//guardamos un parte en blanco
	      $newParteId = $this->Parte->id;
	      
	      //crear todo el esqueleto para almacenar datos
	      
	      $data= array('id' => $newParteId,'usuariovendedor' => '1','tipoparte_id'=> $tipoparteid,'incidencia_id'=>'1');
	      
	      // Por cada elemento que contenga el formato de parte
	      
	      $camposparte = $this->TipocamposTipoparte->obtenercamposformato($tipoparteid); 
	      //recorrer cada uno de estos campos y por cada uno obtener la categoria y crear un nuevo
	      foreach($camposparte as $dato){
		foreach($dato as $d){
		   $this->inicializar($d['id'], $d['categoria_id'], $newParteId, "1"); //recorremos por categoria e id y creamos 
		}
	      }
			if ($this->Parte->saveAll($data,array('validate'=>'first'))) { //validamos si los dos son correctos.
				$this->Session->setFlash(__('El parte ha sido creado.'));
				return $this->redirect(array('action' => 'indexvendedor'));
			} else {
				$this->Session->setFlash(__('El parte no ha podido ser creado intentelo de nuevo.'));
			}
			
	    } 
		
	    $usuariogestor = $this->Parte->Usuario->find('list',array('fields'=>'Usuario.username'));
	    $this->set(compact ('usuariogestor'));
	
	}
	// IMPORTANTE $this->set('una_variable_para_la_vista','valor_de_la_variable');
	
	//EJEMPLO:  $this->set('id',$id); Y EN LA VISTA: echo $form->input('cliente_id',array('value'=>$id));
	
	
	
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
	return $this->redirect(array('action' => 'indexvendedor'));
	}
}


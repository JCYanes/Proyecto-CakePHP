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
    public $uses = array('Parte','Valoresdefecto','Categoria','TipocamposTipoparte','User');
    
    
    
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
	      'conditions' => array('Parte.usuariogestor'=> $usuarioid),
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
    
    
    public function editar($id) {
      $this->requestAction('/Enteros/edit/'.$id.'/'); 
    }
    
    
    public function editvendedor($id = null) {
    $tipoparteid = $this->Valoresdefecto->obtenervalor(); //Obtiene el valor guardado por defecto del formulario a usar.
    
	    
    if (!$this->Parte->exists($id)) {
		    throw new NotFoundException(__('Invalido parte'));
	    }
	    //Tenemos que pasar los enteros que pertenecen al parte y rellenarlos
	    $this->editar(113);
	    if ($this->request->is(array('post', 'put'))) {
	    
		    if ($this->Parte->saveAssociated($this->request->data)) {
			    $this->Session->setFlash(__('El parte ha sido actualizado.'));
			    return $this->redirect(array('action' => 'index'));
		    } else {
			    $this->Session->setFlash(__('No se ha podido actualizar intentelo de nuevo.'));
		    }
	    } else {
		    $options = array('conditions' => array('Parte.' . $this->Parte->primaryKey => $id));
		    $this->request->data = $this->Parte->find('first', $options);
	    }
	    $usuariogestor = $this->Parte->User->find('list',array('fields'=>'User.id','User.username'));
	    
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
	      //Ponemos el usuario creador como el vendedor que ha creado el parte
	      $this->request->data['Parte']['usuariovendedor']=$this->Auth->User('id');
	      
	      
	      $this->Parte->save($this->request->data);//guardamos un parte en blanco
	      $newParteId = $this->Parte->id;

	      //crear todo el esqueleto para almacenar datos
	      
	      $data= array('id' => $newParteId,'tipoparte_id'=> $tipoparteid,'incidencia_id'=>'1');
	      
	      // Por cada elemento que contenga el formato de parte
	      
	      $camposparte = $this->TipocamposTipoparte->obtenercamposformato($tipoparteid); 
	      //recorrer cada uno de estos campos y por cada uno obtener la categoria y crear un nuevo
	      foreach($camposparte as $dato){
		foreach($dato as $d){
		   $this->inicializar($d['id'], $d['categoria_id'], $newParteId, "1"); //recorremos por categoria e id y creamos 
		}
	      }
			if ($this->Parte->saveAll($data)) { 
				$this->Session->setFlash(__('El parte ha sido creado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El parte no ha podido ser creado intentelo de nuevo.'));
			}
			
	    } 
	    $usuariogestor = $this->Parte->User->find('list',array('fields'=>'User.username','conditions' => array('User.role_id = 2')));
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
	return $this->redirect(array('action' => 'index'));
	}
}


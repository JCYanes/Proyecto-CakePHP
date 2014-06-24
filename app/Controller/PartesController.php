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
    public $uses = array('Parte','Valoresdefecto','Categoria','TipocamposTipoparte','User','Tipofamilia','Tipocampo');
    
    
    
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
    
    
    public function editvendedor($id = null) {
		$this->layout='parte';
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
		$options = array('conditions' => array('Parte.' . $this->Parte->primaryKey => $id));
		$datos=$this->Parte->find('first', $options);
			// Get "Reale" "tipocampos_tipoparte_id"
			foreach ($datos['Reale'] as $dato){
				$key = "tipocampos_tipoparte_id";
				foreach ($dato as $d => $value){
					if ($d == $key){
						$listReale[] = $value;
						//$listTipoReale[]= $this->TipocamposTipoparte->obteneridcampo($value);
						$datos=$this->TipocamposTipoparte->obteneridcampo($value);
						foreach($datos as $dato){
							foreach($dato as $d){
								$listTipoReale[]= $d['tipocampo_id'];
							}
						}
					}
				}
			}
			$datos=$this->Parte->find('first', $options);
			// Get "Entero" "tipocampos_tipoparte_id"
			foreach ($datos['Entero'] as $dato){
				$key = "tipocampos_tipoparte_id";
				foreach ($dato as $d => $value){
					if ($d == $key){
						$listEntero[] = $value;
						//$listTipoEntero[]= $this->TipocamposTipoparte->obteneridcampo($value);
						$datos=$this->TipocamposTipoparte->obteneridcampo($value);
						foreach($datos as $dato){
							foreach($dato as $d){
								$listTipoEntero[]= $d['tipocampo_id'];
							}
						}
					}
				}
			}
		
			$datos=$this->Parte->find('first', $options);
			// Get "Texto" "tipocampos_tipoparte_id"
			foreach ($datos['Texto'] as $dato){
				$key = "tipocampos_tipoparte_id";
				foreach ($dato as $d => $value){
					if ($d == $key){
						$listTexto[] = $value;
						$datos=$this->TipocamposTipoparte->obteneridcampo($value);
						foreach($datos as $dato){
							foreach($dato as $d){
								$listTipoTexto[]= $d['tipocampo_id'];
							}
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
	/**
	Inicializamos las tablas que almacenaran los valores
	**/
	
	public function inicializar($id, $cat_id, $newParteId, $workFlow,$tipocampo){
	    
	    $categoria = $this->Categoria->obtenervalor($cat_id);
	    $campo = $this->Tipocampo->obtenername($tipocampo);
	    $this->requestAction('/'.$categoria.'/add/'.$newParteId.'/'.$workFlow.'/'.$id.'/'.$campo); 
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
	  
	  // Por cada elemento que contenga el formato de parte creamos los campos tanto nuevos como para acualizar
	  
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


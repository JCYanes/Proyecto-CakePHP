<?php
App::uses('AppController', 'Controller');
/**
 * reales Controller
 *
 * @property Reale $Reale
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RealesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	//public $uses = array('Parte');
	
	
public function isAuthorized($user) {
      // All registered users can add partes
      if (in_array($this->action, array('add'))) {
	  return true;
      }

    return parent::isAuthorized($user);
  }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Reale->recursive = 0;
		$this->set('reales', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Reale->exists($id)) {
			throw new NotFoundException(__('Invalid Reale'));
		}
		$options = array('conditions' => array('Reale.' . $this->Reale->primaryKey => $id));
		$this->set('reale', $this->Reale->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
 
 
	public function add($idparte,$idworkflow,$idtipocampospartes,$campo) {
			$this->Reale->create();
			$this->Reale->save();
			$newParteId = $this->Reale->id;//recuperamos el identificador
			/*if ($campo =='Caja'){
				//Obtener el campo final del parte anterior del tipo Caja y meterlo
				echo"prueba";
				
			}*/
			$data= array('id' => $newParteId,
				     'parte_id'=>$idparte,
				     'workflowpaso_id'=>$idworkflow,
				     'tipocampos_tipoparte_id'=>$idtipocampospartes,
				     'name'=>$campo);
			if ($this->Reale->saveAll($data)) {
				$this->Session->setFlash(__('The Reale has been saved.'));
				
			} else {
				$this->Session->setFlash(__('The Reale could not be saved. Please, try again.'));
			}
			//return $this->redirect(array('controller'=>'Partes','action' => 'nuevoparte'));
		
		
		$this->autoRender = false;
		/*$partes = $this->Reale->Parte->find('list');
		$workflowpasos = $this->Reale->Workflowpaso->find('list');
		$tipocamposTipopartes = $this->Reale->TipocamposTipoparte->find('list');
		$this->set(compact('partes', 'workflowpasos', 'tipocamposTipopartes'));*/
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Reale->exists($id)) {
			throw new NotFoundException(__('Invalid Reale'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Reale->save($this->request->data)) {
				$this->Session->setFlash(__('The Reale has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Reale could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Reale.' . $this->Reale->primaryKey => $id));
			$this->request->data = $this->Reale->find('first', $options);
		}
		$partes = $this->Reale->Parte->find('list');
		$workflowpasos = $this->Reale->Workflowpaso->find('list');
		$tipocamposTipopartes = $this->Reale->TipocamposTipoparte->find('list');
		$this->set(compact('partes', 'workflowpasos', 'tipocamposTipopartes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Reale->id = $id;
		if (!$this->Reale->exists()) {
			throw new NotFoundException(__('Invalid Reale'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Reale->delete()) {
			$this->Session->setFlash(__('The Reale has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Reale could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

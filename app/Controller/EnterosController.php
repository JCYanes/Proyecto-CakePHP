<?php
App::uses('AppController', 'Controller');
/**
 * Enteros Controller
 *
 * @property Entero $Entero
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EnterosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	
	
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
		$this->Entero->recursive = 0;
		$this->set('enteros', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Entero->exists($id)) {
			throw new NotFoundException(__('Invalid entero'));
		}
		$options = array('conditions' => array('Entero.' . $this->Entero->primaryKey => $id));
		$this->set('entero', $this->Entero->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($idparte,$idworkflow,$idtipocampospartes,$campo) {
		
			$this->Entero->create();
			$this->Entero->save();
			$newEnteroId = $this->Entero->id;//recuperamos el identificador
			$data= array('id' => $newEnteroId,
				     'parte_id'=>$idparte,
				     'workflowpaso_id'=>$idworkflow,
				     'tipocampos_tipoparte_id'=>$idtipocampospartes,
				     'name'=>$campo);
			
			if ($this->Entero->saveAll($data)) {
			
				$this->Session->setFlash(__('The entero has been saved.'));
				//return $this->redirect(array('controller'=>'Partes','action' => 'nuevoparte'));
			} else {
				$this->Session->setFlash(__('The entero could not be saved. Please, try again.'));
			}
		$this->autoRender = false;
		//$partes = $this->Entero->Parte->find('list');
		//$workflowpasos = $this->Entero->Workflowpaso->find('list');
		//$tipocamposTipopartes = $this->Entero->TipocamposTipoparte->find('list');
		//$this->set(compact('workflowpasos', 'tipocamposTipopartes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
	
		if (!$this->Entero->exists($id)) {
			throw new NotFoundException(__('Invalid entero'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Entero->save($this->request->data)) {
				$this->Session->setFlash(__('The entero has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entero could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Entero.' . $this->Entero->primaryKey => $id));
			$this->request->data = $this->Entero->find('first', $options);
		}
		$partes = $this->Entero->Parte->find('list');
		$workflowpasos = $this->Entero->Workflowpaso->find('list');
		$tipocamposTipopartes = $this->Entero->TipocamposTipoparte->find('list');
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
		$this->Entero->id = $id;
		if (!$this->Entero->exists()) {
			throw new NotFoundException(__('Invalid entero'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Entero->delete()) {
			$this->Session->setFlash(__('The entero has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entero could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

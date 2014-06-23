<?php
App::uses('AppController', 'Controller');
/**
 * Floats Controller
 *
 * @property Float $Float
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FloatsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Float->recursive = 0;
		$this->set('floats', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Float->exists($id)) {
			throw new NotFoundException(__('Invalid float'));
		}
		$options = array('conditions' => array('Float.' . $this->Float->primaryKey => $id));
		$this->set('float', $this->Float->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
 
	public function add($idparte,$idworkflow,$idtipocampospartes) {
		if ($this->request->is('post')) {
			$this->Float->create();
			$this->request->data;
			$newParteId = $this->Float->id;//recuperamos el identificador
			$data= array('id' => $newParteId,
				     'parte_id'=>$idparte,
				     'workflowpaso_id'=>$idworkflow,
				     'tipocampos_tipoparte_id'=>$idtipocampospartes);
			
			if ($this->Float->saveAll($data)) {
				$this->Session->setFlash(__('The float has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The float could not be saved. Please, try again.'));
			}
		}
		/*$partes = $this->Float->Parte->find('list');
		$workflowpasos = $this->Float->Workflowpaso->find('list');
		$tipocamposTipopartes = $this->Float->TipocamposTipoparte->find('list');
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
		if (!$this->Float->exists($id)) {
			throw new NotFoundException(__('Invalid float'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Float->save($this->request->data)) {
				$this->Session->setFlash(__('The float has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The float could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Float.' . $this->Float->primaryKey => $id));
			$this->request->data = $this->Float->find('first', $options);
		}
		$partes = $this->Float->Parte->find('list');
		$workflowpasos = $this->Float->Workflowpaso->find('list');
		$tipocamposTipopartes = $this->Float->TipocamposTipoparte->find('list');
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
		$this->Float->id = $id;
		if (!$this->Float->exists()) {
			throw new NotFoundException(__('Invalid float'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Float->delete()) {
			$this->Session->setFlash(__('The float has been deleted.'));
		} else {
			$this->Session->setFlash(__('The float could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

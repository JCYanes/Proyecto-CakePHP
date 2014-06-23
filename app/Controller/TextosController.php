<?php
App::uses('AppController', 'Controller');
/**
 * Textos Controller
 *
 * @property Texto $Texto
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TextosController extends AppController {

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
		$this->Texto->recursive = 0;
		$this->set('textos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Texto->exists($id)) {
			throw new NotFoundException(__('Invalid texto'));
		}
		$options = array('conditions' => array('Texto.' . $this->Texto->primaryKey => $id));
		$this->set('texto', $this->Texto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
 
	public function add($idparte,$idworkflow,$idtipocampospartes) {
		if ($this->request->is('post')) {
			$this->Texto->create();
			$this->request->data;//creamos el texto
			$newParteId = $this->Texto->id;//recuperamos el identificador
			$data= array('id' => $newParteId,
				     'parte_id'=>$idparte,
				     'workflowpaso_id'=>$idworkflow,
				     'tipocampos_tipoparte_id'=>$idtipocampospartes);
			
			if ($this->Texto->saveAll($data)) {
				$this->Session->setFlash(__('The texto has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The texto could not be saved. Please, try again.'));
			}
		}
		/*$partes = $this->Texto->Parte->find('list');
		$workflowpasos = $this->Texto->Workflowpaso->find('list');
		$tipocamposTipopartes = $this->Texto->TipocamposTipoparte->find('list');
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
		if (!$this->Texto->exists($id)) {
			throw new NotFoundException(__('Invalid texto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Texto->save($this->request->data)) {
				$this->Session->setFlash(__('The texto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The texto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Texto.' . $this->Texto->primaryKey => $id));
			$this->request->data = $this->Texto->find('first', $options);
		}
		$partes = $this->Texto->Parte->find('list');
		$workflowpasos = $this->Texto->Workflowpaso->find('list');
		$tipocamposTipopartes = $this->Texto->TipocamposTipoparte->find('list');
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
		$this->Texto->id = $id;
		if (!$this->Texto->exists()) {
			throw new NotFoundException(__('Invalid texto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Texto->delete()) {
			$this->Session->setFlash(__('The texto has been deleted.'));
		} else {
			$this->Session->setFlash(__('The texto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('AppController', 'Controller');
/**
 * Tipocampos Controller
 *
 * @property Tipocampo $Tipocampo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TipocamposController extends AppController {

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
		$this->Tipocampo->recursive = 0;
		$this->set('tipocampos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tipocampo->exists($id)) {
			throw new NotFoundException(__('Invalid tipocampo'));
		}
		$options = array('conditions' => array('Tipocampo.' . $this->Tipocampo->primaryKey => $id));
		$this->set('tipocampo', $this->Tipocampo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tipocampo->create();
			if ($this->Tipocampo->save($this->request->data)) {
				$this->Session->setFlash(__('The tipocampo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipocampo could not be saved. Please, try again.'));
			}
		}
		$tipopartes = $this->Tipocampo->Tipoparte->find('list');
		$this->set(compact('tipopartes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tipocampo->exists($id)) {
			throw new NotFoundException(__('Invalid tipocampo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tipocampo->save($this->request->data)) {
				$this->Session->setFlash(__('The tipocampo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipocampo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tipocampo.' . $this->Tipocampo->primaryKey => $id));
			$this->request->data = $this->Tipocampo->find('first', $options);
		}
		$tipopartes = $this->Tipocampo->Tipoparte->find('list');
		$this->set(compact('tipopartes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Tipocampo->id = $id;
		if (!$this->Tipocampo->exists()) {
			throw new NotFoundException(__('Invalid tipocampo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tipocampo->delete()) {
			$this->Session->setFlash(__('The tipocampo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tipocampo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

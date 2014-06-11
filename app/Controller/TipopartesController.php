<?php
App::uses('AppController', 'Controller');
/**
 * Tipopartes Controller
 *
 * @property Tipoparte $Tipoparte
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TipopartesController extends AppController {

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
		$this->Tipoparte->recursive = 0;
		$this->set('tipopartes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tipoparte->exists($id)) {
			throw new NotFoundException(__('Invalid tipoparte'));
		}
		$options = array('conditions' => array('Tipoparte.' . $this->Tipoparte->primaryKey => $id));
		$this->set('tipoparte', $this->Tipoparte->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tipoparte->create();
			if ($this->Tipoparte->save($this->request->data)) {
				$this->Session->setFlash(__('The tipoparte has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipoparte could not be saved. Please, try again.'));
			}
		}
		$tipocampos = $this->Tipoparte->Tipocampo->find('list');
		$this->set(compact('tipocampos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tipoparte->exists($id)) {
			throw new NotFoundException(__('Invalid tipoparte'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tipoparte->save($this->request->data)) {
				$this->Session->setFlash(__('The tipoparte has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipoparte could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tipoparte.' . $this->Tipoparte->primaryKey => $id));
			$this->request->data = $this->Tipoparte->find('first', $options);
		}
		$tipocampos = $this->Tipoparte->Tipocampo->find('list');
		$this->set(compact('tipocampos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Tipoparte->id = $id;
		if (!$this->Tipoparte->exists()) {
			throw new NotFoundException(__('Invalid tipoparte'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tipoparte->delete()) {
			$this->Session->setFlash(__('The tipoparte has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tipoparte could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

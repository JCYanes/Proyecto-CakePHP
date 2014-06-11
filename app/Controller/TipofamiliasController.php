<?php
App::uses('AppController', 'Controller');
/**
 * Tipofamilias Controller
 *
 * @property Tipofamilia $Tipofamilia
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TipofamiliasController extends AppController {

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
		$this->Tipofamilia->recursive = 0;
		$this->set('tipofamilias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tipofamilia->exists($id)) {
			throw new NotFoundException(__('Invalid tipofamilia'));
		}
		$options = array('conditions' => array('Tipofamilia.' . $this->Tipofamilia->primaryKey => $id));
		$this->set('tipofamilia', $this->Tipofamilia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tipofamilia->create();
			if ($this->Tipofamilia->save($this->request->data)) {
				$this->Session->setFlash(__('The tipofamilia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipofamilia could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tipofamilia->exists($id)) {
			throw new NotFoundException(__('Invalid tipofamilia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tipofamilia->save($this->request->data)) {
				$this->Session->setFlash(__('The tipofamilia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipofamilia could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tipofamilia.' . $this->Tipofamilia->primaryKey => $id));
			$this->request->data = $this->Tipofamilia->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Tipofamilia->id = $id;
		if (!$this->Tipofamilia->exists()) {
			throw new NotFoundException(__('Invalid tipofamilia'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tipofamilia->delete()) {
			$this->Session->setFlash(__('The tipofamilia has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tipofamilia could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

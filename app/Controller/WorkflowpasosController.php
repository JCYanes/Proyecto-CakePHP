<?php
App::uses('AppController', 'Controller');
/**
 * Workflowpasos Controller
 *
 * @property Workflowpaso $Workflowpaso
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class WorkflowpasosController extends AppController {

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
		$this->Workflowpaso->recursive = 0;
		$this->set('workflowpasos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Workflowpaso->exists($id)) {
			throw new NotFoundException(__('Invalid workflowpaso'));
		}
		$options = array('conditions' => array('Workflowpaso.' . $this->Workflowpaso->primaryKey => $id));
		$this->set('workflowpaso', $this->Workflowpaso->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Workflowpaso->create();
			if ($this->Workflowpaso->save($this->request->data)) {
				$this->Session->setFlash(__('The workflowpaso has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workflowpaso could not be saved. Please, try again.'));
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
		if (!$this->Workflowpaso->exists($id)) {
			throw new NotFoundException(__('Invalid workflowpaso'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Workflowpaso->save($this->request->data)) {
				$this->Session->setFlash(__('The workflowpaso has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workflowpaso could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Workflowpaso.' . $this->Workflowpaso->primaryKey => $id));
			$this->request->data = $this->Workflowpaso->find('first', $options);
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
		$this->Workflowpaso->id = $id;
		if (!$this->Workflowpaso->exists()) {
			throw new NotFoundException(__('Invalid workflowpaso'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Workflowpaso->delete()) {
			$this->Session->setFlash(__('The workflowpaso has been deleted.'));
		} else {
			$this->Session->setFlash(__('The workflowpaso could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

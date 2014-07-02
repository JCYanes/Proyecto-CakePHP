<?php
/**
*	Copyright (C) 2014 Jésica Carballo Yanes
*
*    This program is free software: you can redistribute it and/or modify
*    it under the terms of the GNU Affero General Public License as
*    published by the Free Software Foundation, either version 3 of the
*    License, or (at your option) any later version.
*
*    This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*    GNU Affero General Public License for more details.
*
*    You should have received a copy of the GNU Affero General Public License
*   along with this program.  If not, see <http://www.gnu.org/licenses/>.
**/
 ?>
<?php
App::uses('AppController', 'Controller');
/**
 * Valoresdefectos Controller
 *
 * @property Valoresdefecto $Valoresdefecto
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ValoresdefectosController extends AppController {

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
		$this->Valoresdefecto->recursive = 0;
		$this->set('valoresdefectos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Valoresdefecto->exists($id)) {
			throw new NotFoundException(__('Invalid valoresdefecto'));
		}
		$options = array('conditions' => array('Valoresdefecto.' . $this->Valoresdefecto->primaryKey => $id));
		$this->set('valoresdefecto', $this->Valoresdefecto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Valoresdefecto->create();
			if ($this->Valoresdefecto->save($this->request->data)) {
				$this->Session->setFlash(__('The valoresdefecto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The valoresdefecto could not be saved. Please, try again.'));
			}
		}
		$tipopartes = $this->Valoresdefecto->Tipoparte->find('list');
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
		if (!$this->Valoresdefecto->exists($id)) {
			throw new NotFoundException(__('Invalid valoresdefecto'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Valoresdefecto->save($this->request->data)) {
				$this->Session->setFlash(__('The valoresdefecto has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The valoresdefecto could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Valoresdefecto.' . $this->Valoresdefecto->primaryKey => $id));
			$this->request->data = $this->Valoresdefecto->find('first', $options);
		}
		$tipopartes = $this->Valoresdefecto->Tipoparte->find('list');
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
		$this->Valoresdefecto->id = $id;
		if (!$this->Valoresdefecto->exists()) {
			throw new NotFoundException(__('Invalid valoresdefecto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Valoresdefecto->delete()) {
			$this->Session->setFlash(__('The valoresdefecto has been deleted.'));
		} else {
			$this->Session->setFlash(__('The valoresdefecto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

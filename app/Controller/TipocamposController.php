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

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

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
 * TipocamposTipopartes Controller
 *
 * @property TipocamposTipoparte $TipocamposTipoparte
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TipocamposTipopartesController extends AppController {

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
		$this->TipocamposTipoparte->recursive = 0;
		$this->set('tipocamposTipopartes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TipocamposTipoparte->exists($id)) {
			throw new NotFoundException(__('Invalid tipocampos tipoparte'));
		}
		$options = array('conditions' => array('TipocamposTipoparte.' . $this->TipocamposTipoparte->primaryKey => $id));
		$this->set('tipocamposTipoparte', $this->TipocamposTipoparte->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TipocamposTipoparte->create();
			if ($this->TipocamposTipoparte->save($this->request->data)) {
				$this->Session->setFlash(__('The tipocampos tipoparte has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipocampos tipoparte could not be saved. Please, try again.'));
			}
		}
		$tipopartes = $this->TipocamposTipoparte->Tipoparte->find('list');
		$tipocampos = $this->TipocamposTipoparte->Tipocampo->find('list');
		$tipofamilias = $this->TipocamposTipoparte->Tipofamilia->find('list');
		$this->set(compact('tipopartes', 'tipocampos', 'tipofamilias'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TipocamposTipoparte->exists($id)) {
			throw new NotFoundException(__('Invalid tipocampos tipoparte'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TipocamposTipoparte->save($this->request->data)) {
				$this->Session->setFlash(__('The tipocampos tipoparte has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipocampos tipoparte could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TipocamposTipoparte.' . $this->TipocamposTipoparte->primaryKey => $id));
			$this->request->data = $this->TipocamposTipoparte->find('first', $options);
		}
		$tipopartes = $this->TipocamposTipoparte->Tipoparte->find('list');//Todos los tipos de parte
		$tipocampos = $this->TipocamposTipoparte->Tipocampo->find('list');
		$tipofamilias = $this->TipocamposTipoparte->Tipofamilia->find('list');
		$this->set(compact('tipopartes', 'tipocampos', 'tipofamilias'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TipocamposTipoparte->id = $id;
		if (!$this->TipocamposTipoparte->exists()) {
			throw new NotFoundException(__('Invalid tipocampos tipoparte'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TipocamposTipoparte->delete()) {
			$this->Session->setFlash(__('The tipocampos tipoparte has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tipocampos tipoparte could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

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
 * Enteros Controller
 *
 * @property Entero $Entero
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EnterosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	
	
   public function isAuthorized($user) {
      // All registered users can add partes
      if (in_array($this->action, array('add'))) {
	  return true;
      }

    return parent::isAuthorized($user);
  }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Entero->recursive = 0;
		$this->set('enteros', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Entero->exists($id)) {
			throw new NotFoundException(__('Invalid entero'));
		}
		$options = array('conditions' => array('Entero.' . $this->Entero->primaryKey => $id));
		$this->set('entero', $this->Entero->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($idparte,$idworkflow,$idtipocampospartes,$campo) {
			$this->Entero->create();
			$this->Entero->save();
			$newEnteroId = $this->Entero->id;//recuperamos el identificador
			$data= array('id' => $newEnteroId,
				     'parte_id'=>$idparte,
				     'workflowpaso_id'=>$idworkflow,
				     'tipocampos_tipoparte_id'=>$idtipocampospartes,
				     'name'=>$campo);
			
			if ($this->Entero->saveAll($data)) {
			
				$this->Session->setFlash(__('The entero has been saved.'));
				//return $this->redirect(array('controller'=>'Partes','action' => 'nuevoparte'));
			} else {
				$this->Session->setFlash(__('The entero could not be saved. Please, try again.'));
			}
		$this->autoRender = false;
	}
	
	public function copiar($idparte,$idtipo){
		$data = $this->Entero->obtenerdatos($idparte,$idtipo);
		foreach($data as $dato){
			foreach($dato as $d){
					echo "el id de este elemento es".$d['id'];
					//Por cada elemento creo uno con el mismo contenido pero workflow =2;
					$this->Entero->create();
					$this->Entero->save();
					$newParteId = $this->Entero->id;
					$data= array('id' => $newParteId,
								 'parte_id'=>$idparte,
								 'tipocampos_tipoparte_id'=>$d['tipocampos_tipoparte_id'],
								 'name'=>$d['name'],
								 'inicial' =>$d['inicial'],
								 'final' => $d['final'],
								 'entrada' => $d['entrada'],
								 'salida' => $d['salida'],
								 'parte_id' => $d['parte_id'],
								 'workflowpaso_id' => '2');//cambiamos el workflow para que no haya problemas al editar
			}
		if ($this->Entero->save($data)){
						echo "Se ha guardado el dato con el id nuevo:".$newParteId;
				}
				
		}		
		$this->autoRender = false;
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null,$idparte,$idworkflow,$idtipocampospartes,$campo) {
	
		if (!$this->Entero->exists($id)) {
			throw new NotFoundException(__('Invalid entero'));
		}
		else{
			$data= array('id' => $id,
				     'parte_id'=>$idparte,
				     'workflowpaso_id'=>$idworkflow,
				     'tipocampos_tipoparte_id'=>$idtipocampospartes,
				     'name'=>$campo);
			if ($this->Entero->saveAll($data)) {
				$this->Session->setFlash(__('The entero has been saved.'));
				//return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entero could not be saved. Please, try again.'));
			}
		
		}
		$this->autoRender = false;
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Entero->id = $id;
		if (!$this->Entero->exists()) {
			throw new NotFoundException(__('Invalid entero'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Entero->delete()) {
			$this->Session->setFlash(__('The entero has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entero could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

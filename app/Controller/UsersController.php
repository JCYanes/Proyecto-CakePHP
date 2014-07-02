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
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	
	
	
public function beforeFilter() { //Se ejecuta antes de cualquier accion del controlador 
        parent::beforeFilter();
        $this->Auth->allow('add','logout','login');
    }
    
    
 /**
 *
 *Login de usuarios
 *
 */
public function login() {
	$this->layout='login';
	if ($this->request->is('post')) {
        if ($this->Auth->login()) {
        
		$id = $this->Auth->user('id');
                $nombre = $this->Auth->user('username');
                $this->Session->write('Usuario.nombre', $nombre);
                $this->Session->write('Usuario.id',$id);
                
	    $this->Session->setFlash(('Bienvenido, '. $this->Auth->user('username')));
            return $this->redirect($this->Auth->redirect());
        }else{
        $this->Session->setFlash(('Usuario no permitido, intentelo de nuevo'), 'default', array(), 'auth');
	}
    }
}

 /**
 *
 *Logout de usuarios
 *
 */

public function logout() {
     $this->Session->setFlash(__('Ha salido del sistema.','default',array(), 'auth'));
     $this->Session->destroy();
    return $this->redirect($this->Auth->logout());
}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('usuario', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->exists())
			  {
			  throw new NotFoundException(__('Usuario ya en uso'));
			  }
			  elseif ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario has been saved.'));
				return $this->redirect(array('action' => 'index'));// tiene que dirigirse a su menu segun el usuario que sea
			} else {
				$this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
			}
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
		
			
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Porfavor provea un id de usuario'));
		}
		if ($this->request->is(array('post','put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The usuario fue modificado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El id proporcionado no es valido.'));
			}
		} else {
			
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
			unset($this->request->data['User']['password']);
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->request->onlyAllow('post');
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid usuario'));
		}
		
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The usuario has been deleted.'));
			 return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The usuario could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
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

App::uses('Controller','Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
     public $components = array('DebugKit.Toolbar', 
     'Session',
     
     'Auth' => array(
            'loginRedirect' => array('controller' => 'partes', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authError' => 'Tienes que estar logueado para ver la pagina.',
            'loginError' => 'Invalido nombre de usuario ingresado.',
            'authorize'=> array('Controller'),
            'authenticate' => array('Form')
     )
     );
       //permitimos ver el index y las vistas
     public function beforeFilter() {
	Security::setHash('sha1');
	$this->Auth->deny(); // todos los controllers son accesibles solo logueando
        
    }
     
    public function isAuthorized($user) {
	return true;
    }
    
     
     
     
}




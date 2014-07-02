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
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * Usuario Model
 *
 * @property Role $Role
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

	
/**
* Validation
*
*/
	public $validate = array(
	      'username' => array(
		  'required' => array(
		      'rule' => array('notEmpty'),
		      'message' => 'A username is required'
		  )
	      ),
	      'password' => array(
		  'required' => array(
		      'rule' => array('notEmpty'),
		      'message' => 'A password is required'
		  )
	      ),
	      'password_update' => array(
		 'min_length' => array(
		      'rule' => array('minLength', '6'),   
		      'message' => 'Contraseña debe tener 6 caracteres',
		      'allowEmpty' => true,
		      'required' => false
		  )
	
	      ),
	      'password_confirm_update' => array(
		'equaltofield' => array(
		    'rule' => array('equaltofield','password_update'),
		    'message' => 'Ambos deberian ser iguales.',
		    'required' => false,
		)
	      )
	);
    

    
/**
 * belongsTo associations
 *@var array
 */
 

	public $belongsTo = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
 	
	
 /*
 * Para guardar el pasword encriptado
 *
 */
	public function beforeSave($options = array()) {
	     if (!$this->id) {
		$passwordHasher = new SimplePasswordHasher();
		$this->data['User']['password'] = $passwordHasher->hash($this->data['User']['password']);
	    }
	  
	    // if we get a new password, hash it
        if (isset($this->data[$this->alias]['password_update']) && !empty($this->data[$this->alias]['password_update'])) {
            $this->data[$this->alias]['password'] =  $passwordHasher->hash($this->data[$this->alias]['password_update']);
        }
	    return true;
	}
	
	function obteneridrol($id)
	{
	  
	  $datos = $this->query("SELECT role_id FROM users WHERE id=$id");
	  return $this->getQueryResult($datos);
	}
	
	
	// getQueryResult: devuelve el primer valor de la consulta realizada
	// Parámetros: hay que pasarle un array (devuelto por una consulta sql
	function getQueryResult($datos){
	  foreach($datos[0] as $dato){
	    foreach($dato as $d){
		return $d;	// devuelve el primer valor de la consulta realizada       
	    }
	  }
	  
	}
	
	
	
	
	
	
}

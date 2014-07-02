<?php
/**
 * This is Sessions Schema file
 *
 * Use it to configure database for Sessions
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
* */

/*
 *
 * Using the Schema command line utility
 * cake schema run create Sessions
 *
 */
class SessionsSchema extends CakeSchema {

	public $name = 'Sessions';

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $cake_sessions = array(
		'id' => array('type' => 'string', 'null' => false, 'key' => 'primary'),
		'data' => array('type' => 'text', 'null' => true, 'default' => null),
		'expires' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);

}

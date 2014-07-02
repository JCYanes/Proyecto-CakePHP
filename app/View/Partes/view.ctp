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
<div class="partes view">
<h2><?php echo __('Parte'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($parte['Parte']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creado'); ?></dt>
		<dd>
			<?php echo h($parte['Parte']['created']); ?>&nbsp;
		</dd>
		<dt><?php echo __('Firmado'); ?></dt>
		<dd>
			<?php if(($parte['Parte']['firmado'])=== true){
			  echo h("El parte ha sido firmado");
			  } else{
			   echo h("El parte no ha sido firmado");
			   }?>&nbsp;
		</dd>
		<dt><?php echo __('Usuario Gestor'); ?></dt>
		<dd>
			<?php echo h($parte['User']['username']); ?>&nbsp;
		</dd>
		<dt><?php echo __('Tipo de parte'); ?></dt>
		<dd>
			<?php echo h($parte['Tipoparte']['name']); ?>&nbsp;
		</dd>
		
	</dl>
	
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listado de Partes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Cerrar secion'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>

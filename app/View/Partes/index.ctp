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
<div class="partes index">
	<h2><?php echo __('Partes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?>&nbsp;</th>
			<th><?php echo $this->Paginator->sort('creado                      ');?>&nbsp;</th>
			<th class="actions"><?php echo __('Acciones'); ?>&nbsp;</th>
	</tr>
	<?php foreach ($partes as $parte): ?>
	<tr>
		<td><?php echo h($parte['Parte']['id']); ?></td>
		<td><?php echo h($parte['Parte']['created']); ?></td>
		<td class="actions">
		  <?php if (($parte['Parte']['firmado']<>1) && ($tiporol == 3)) {
					echo $this->Html->link(__('Editar'), array('action' => 'editvendedor', $parte['Parte']['id'])); 
				}
		  ?>
		  
		  <?php if (($parte['Parte']['firmado']<>1) && ($tiporol == 3)) {
					echo $this->Form->postLink(('Firmar'), array('action'=>'firmar', $parte['Parte']['id']), array('confirm' =>'¿Seguro que quieres firmar, (esta accion no se puede eliminar)?'));
				}
		  ?>
		  <?php if (($parte['Parte']['firmado']==1) && ($parte['Parte']['validado']<>1) && ($tiporol == 2) && ($parte['Parte']['copiado']<>1) ) {
					echo $this->Form->postLink(__('Crear copia para validar'), array('action' => 'crearcopia', $parte['Parte']['id'])); 
				}
		  ?>
		  <?php if (($parte['Parte']['firmado']==1) && ($parte['Parte']['validado']<>1) && ($tiporol == 2) && ($parte['Parte']['copiado']==1) ) {
					echo $this->Html->link(__('Visualizar y Actualizar'), array('action' => 'actualizar', $parte['Parte']['id'])); 
				}
		  ?>
		   <?php if (($parte['Parte']['firmado']==1) && ($parte['Parte']['validado']<>1) && ($tiporol == 2) && ($parte['Parte']['copiado']==1)) {
					echo $this->Form->postLink(('Validar'), array('action'=>'validar', $parte['Parte']['id']), array('confirm' =>'¿Seguro que quieres validar, (esta accion no se puede eliminar)?'));
				}
		  ?>
		  <?php 
				echo $this->Html->link(__('Ver detalles'), array('Controller' => 'Partes', 'action' => 'view', $parte['Parte']['id'])); 
			?>
		      
		      
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
	
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php if ($tiporol ==3){
		  echo $this->Html->link(__('Nuevo parte'), array('action' => 'nuevoparte'));
		} 
		?>
		</li>
		<li><?php if ($tiporol ==2){
		  echo $this->Html->link(__('Administrar Usuarios'), array('controller' => 'users', 'action' => 'index'));
		} 
		?>
		</li>
		<li><?php echo $this->Html->link(__('Cerrar sesion'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
		
	</ul>
</div>


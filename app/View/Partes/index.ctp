<div class="partes index">
	<h2><?php echo __('Partes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('creado'); ?></th>
			<th><?php echo $this->Paginator->sort('validado'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach ($partes as $parte): ?>
	<tr>
		<td><?php echo h($parte['Parte']['id']); ?>&nbsp;</td>
		<td><?php echo h($parte['Parte']['created']); ?>&nbsp;</td>
		<td><?php echo h($parte['Parte']['validado']); ?></td>
		<td class="actions">
		  
		  <?php if (($parte['Parte']['firmado']<>1) && ($tiporol == 3)) {
		  
			  echo $this->Html->link(__('Editar'), array('action' => 'editvendedor', $parte['Parte']['id'])); 
			  }?>
		  
		  <?php if (($parte['Parte']['firmado']<>1) && ($tiporol == 3)) {
		      echo $this->Form->postLink(('Firmar'), array('action'=>'firmar', $parte['Parte']['id']), array('confirm' =>'Seguro que quieres firmar, (esta accion no se puede eliminar)?')); 
		      }?>
		      
		       <?php echo $this->Html->link(__('Ver detalles'), array('Controller' => 'Partes', 'action' => 'view', $parte['Parte']['id'])); ?>
		      
		      
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
		<li><?php echo $this->Html->link(__('Cerrar sesion'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
		
	</ul>
</div>


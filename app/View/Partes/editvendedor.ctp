<div class="partes form">
<?php echo $this->Form->create('Parte',array('action' => 'editvendedor')); ?>
	<fieldset>
		<legend><?php echo __('Editar Parte'); ?></legend>
	<?php
		echo $this->Form->input('Parte.id');
		//echo $this->Form->input('Entero.0.inicial');
		//echo $this->Form->input('Parte.usuariogestor', array('label' => 'Gerente'));
		
		$enteros = $this->request->data;
		
		$cont = 0;
		$num_campos = 0;
		$cnt = 0;
		foreach ($enteros['Entero'] as $entero){
		  foreach($entero as $e){
		    $num_campos = $num_campos + 1;
		  }
		  break;
		}

		
		foreach ($enteros['Entero'] as $entero){
		  foreach($entero as $e){
		    $array_enteros[] = $e;
		  }
		  echo $this->Form->input('Entero.'.$cnt.'.id');
		  echo $this->Form->input('Entero.'.$cnt.'.inicial', array('default' => $array_enteros[$cont+1]));
		  echo $this->Form->input('Entero.'.$cnt.'.final', array('default' => $array_enteros[$cont+2]));
		  echo $this->Form->input('Entero.'.$cnt.'.entrada', array('default' => $array_enteros[$cont+3]));
		  echo $this->Form->input('Entero.'.$cnt.'.salida', array('default' => $array_enteros[$cont+4]));
		  $cont = $cont + $num_campos;
		  $cnt=$cnt+1;
		}
		
		debug($this->request);

		
	?>
	</fieldset>
<?php echo $this->Form->end(('Actualizar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listado de Partes'), array('action' => 'indexvendedor')); ?> </li>
	</ul>
</div>
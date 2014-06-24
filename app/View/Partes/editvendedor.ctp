<div class="partes form">
<?php echo $this->Form->create('Parte',array('action' => 'editvendedor')); ?>
	<fieldset>
		<legend>
		  <?php echo __('Editar Parte'); ?>
		</legend>
	<div id="columns">
	<?php
		
		echo $this->Form->input('Parte.id');
		$i=0;
		foreach ($elementos as $elemento){
			echo ($familias[$i])."<br>";
			foreach ($elemento as $valores){
				foreach ($valores as $dato){
					echo ('El id del elemento es: '.$dato['id'])."<br>";
					if (in_array($dato['id'],$listEntero)){
						$id = array_search($dato['id'], $listEntero);
						$categoria='Entero.';
						$tipo= $listTipoEntero[$id];
					}else if (in_array($dato['id'],$listReale)){
						$id = array_search($dato['id'], $listReale);
						$categoria='Reale.';
						$tipo=$listTipoReale[$id];
					}else{//$listTexto
						$id = array_search($dato['id'], $listTexto);
						$categoria='Texto.';
						$tipo=$listTipoTexto[$id];
					}
						if ($tipo =='1'){ //Si es un texto lo guardamos en el campo final
							echo $this->Form->input($categoria.$id.'.id');
							//echo $this->Form->input($categoria.$id.'.name');
							echo $this->Form->input($categoria.$id.'.final',array('label' => 'Observaciones de '.$familias[$i])); 	
						}else if ($tipo =='2'){//Si es un lavado
							echo $this->Form->input($categoria.$id.'.id');
							echo $this->Form->label("Tunel Lavado: ".($id +1));
							echo $this->Form->input($categoria.$id.'.entrada',array('label' => 'Entrante'));
							echo $this->Form->input($categoria.$id.'.salida',array('label' => 'Saliente')); 	
							
						}else if ($tipo =='3'){//Si es un surtidor
							echo $this->Form->input($categoria.$id.'.id');
							echo $this->Form->label("Surtidor: ".($id +1));
							echo $this->Form->input($categoria.$id.'.inicial',array('label' => 'Lectura Actual'));  //input('username', array('label' => 'Username'));
							echo $this->Form->input($categoria.$id.'.final',array('label' => 'Lectura Anterior')); 	 
						}else if ($tipo =='4'){//Si es un campo total
							echo $this->Form->input($categoria.$id.'.id');
							//echo $this->Form->input($categoria.$id.'.name');
							echo $this->Form->input($categoria.$id.'.final',array('label' => 'Total')); 
						}else if ($tipo =='5'){//Si es un campo caja
							echo $this->Form->input($categoria.$id.'.inicial',array('label' => 'Inicial')); 
							echo $this->Form->input($categoria.$id.'.entrada',array('label' => 'Entrante'));
							echo $this->Form->input($categoria.$id.'.salida',array('label' => 'Saliente'));
							echo $this->Form->input($categoria.$id.'.final',array('label' => 'Final'));
						}
				}
			}
			$i++;
		}
		debug($this->request->data);

		
	?>
	</div>
	</fieldset>
<?php echo $this->Form->end(('Actualizar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listado de Partes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Cerrar secion'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
	</ul>
</div>

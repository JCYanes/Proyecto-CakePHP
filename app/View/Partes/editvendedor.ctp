<div class="partes form">
<?php echo $this->Form->create('Parte',array('action' => 'editvendedor')); ?>
	<fieldset>
		<legend>
		  <?php echo __('Editar Parte'); ?>
		</legend>
	<div id="columns">
	<?php
		
		echo $this->Form->input('Parte.id');
	
		echo ('El numero de familias es: ' . count($familias)."<br>");
		$i=0;
		foreach ($elementos as $elemento){
			echo ("Elemento de la familia: ".$familias[$i])."<br>";
			foreach ($elemento as $valores){
				foreach ($valores as $dato){
					echo ('El id del elemento es: '.$dato['id'])."<br>";
					if (in_array($dato['id'],$listEntero)){
						echo 'Se encontro';
						$id = array_search($dato['id'], $listEntero);
						$categoria= 'Entero';
						$tipo= $listTipoEntero[$id];
					}else if (in_array($dato['id'],$listFloat)){
						echo 'Se encontro';
						$id = array_search($dato['id'], $listFloat);
						$categoria= 'Float';
						$tipo=$listTipoFloat[$id];
					}else{//$listTexto
						echo 'Se encontro';
						$id = array_search($dato['id'], $listTexto);
						$categoria= 'Texto';
						$tipo=$listTipoTexto[$id];
					}
					
						if ($tipo=='1'){
							echo "tengo 4 campos";
							echo $this->Form->input($categoria.'.'.$i.'.id');   //echo $this->Form->input('Entero.'.$cnt.'.id');
							echo $this->Form->input($categoria.'.'.$i.'.inicial');
							echo $this->Form->input($categoria.'.'.$i.'.final'); 
							echo $this->Form->input($categoria.'.'.$i.'.entrada');
							echo $this->Form->input($categoria.'.'.$i.'.salida'); 	
						}else if ($tipo=='2'){
							echo "Soy 1 campo editable";
							echo $this->Form->input($categoria.'.'.$i.'.final'); 
						}else{
							echo "Soy 1 no editable";
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

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
<div class="partes form">
<?php echo $this->Form->create('Parte',array('action' => 'actualizar')); ?>
	<fieldset>
		<legend>
		  <?php echo __('Validar Parte'); ?>
		</legend>
	<div id="columns">
	<?php
		
		echo $this->Form->input('Parte.id');
		$i=0;
		foreach ($elementos as $elemento){
			?>
			<div id="familias">
			<?php
				echo ($familias[$i])."<br>";
			?>
			</div>
			<?php
			
			foreach ($elemento as $valores){
				foreach ($valores as $dato){
					$indice = 0;
					/*ENTEROS*/
					if (in_array($dato['id'],$listEntero)){
						//$id = array_search($dato['id'], $listEntero);
						$categoria='Entero.';
						$tipo= $listTipoEntero[$id];
						$indexEntero = 0;
						foreach ($listadoEnteros as $listado){
							if ($dato['id'] == $listado['enteros']['tipocampos_tipoparte_id']){
								if (in_array($listado['enteros']['id'], $listIDEntero)){
									$indice = $indexEntero;
								}
							}
							$indexEntero = $indexEntero + 1;
						}	
					}
					/* REALES */
					else if (in_array($dato['id'],$listReale)){
						$id = array_search($dato['id'], $listReale);
						$categoria='Reale.';
						$tipo=$listTipoReale[$id];
						$indexReales = 0;
						foreach ($listadoReales as $listado){
							if ($dato['id'] == $listado['reales']['tipocampos_tipoparte_id']){
								if (in_array($listado['reales']['id'], $listIDReale)){
									$indice = $indexReales;
								}
							}
							$indexReales = $indexReales + 1;
						}
					}
					else{//$listTexto
						$id = array_search($dato['id'], $listTexto);
						$categoria='Texto.';
						$tipo=$listTipoTexto[$id];
						$indexTexto= 0;
						foreach ($listadoTextos as $listado){
							if ($dato['id'] == $listado['textos']['tipocampos_tipoparte_id']){
								if (in_array($listado['textos']['id'], $listIDReale)){
									$indice = $indexTexto;
								}
							}
							$indexTexto = $indexTexto + 1;
						}
					}
					
					/* CAMPO TIPO TEXTO */ 
					if ($tipo =='1'){ 
						?>
						<div id="observaciones">
						<?php
							
							echo $this->Form->input($categoria.$indice.'.id');
							echo $this->Form->input($categoria.$indice.'.final',array('label' => 'Observaciones de '.$familias[$i])); 
							
						?>
						</div>
						<?php	
					}
					
					/* LAVADOS */
					else if ($tipo =='2'){
						?>
						<div id="title">
							<hr>
							<?php
								echo $this->Form->label("Tunel Lavado: ");
							?>
							<hr>
						</div>
						<div id="surtidores">
						<?php
							echo $this->Form->input($categoria.$indice.'.id');
							echo $this->Form->input($categoria.$indice.'.entrada',array('label' => 'Entrante'));
							echo $this->Form->input($categoria.$indice.'.salida',array('label' => 'Saliente')); 
						?>
						</div>
						<?php	
						
					}
					
					/* SURTIDORES */
					else if ($tipo =='3'){
						?>
						<div id="title">
							<hr>
							<?php
								echo $this->Form->label("Surtidor: ");
							?>
							<hr>
						</div>
						<div id="surtidores">
						<?php
							echo $this->Form->input($categoria.$indice.'.id');
							echo $this->Form->input($categoria.$indice.'.inicial',array('label' => 'Lectura Actual'));  //input('username', array('label' => 'Username'));
							echo $this->Form->input($categoria.$indice.'.final',array('label' => 'Lectura Anterior')); 	 
						?>
						</div>
						<?php
					}
					
					/* CAMPO TOTAL */
					else if ($tipo =='4'){
						echo $this->Form->input($categoria.$indice.'.id');
						echo $this->Form->input($categoria.$indice.'.final',array('label' => 'Total')); 
					}
					
					/* CAJA */
					else if ($tipo =='5'){
						?>
						<div id="title">
							<hr>
							<?php
								echo $this->Form->label("Liquidez");
							?>
							<hr>
						</div>
						<div id="caja">
						<?php
							echo $this->Form->input($categoria.$indice.'.id');
							echo $this->Form->input($categoria.$indice.'.inicial',array('label' => 'Inicial')); 
							echo $this->Form->input($categoria.$indice.'.entrada',array('label' => 'Entrante'));
							echo $this->Form->input($categoria.$indice.'.salida',array('label' => 'Saliente'));
							echo $this->Form->input($categoria.$indice.'.final',array('label' => 'Final'));
						?>
						</div>
						<?php
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

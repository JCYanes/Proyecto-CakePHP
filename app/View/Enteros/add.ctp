<div class="enteros form">
<?php echo $this->Form->create('Entero'); ?>
	<fieldset>
		<legend><?php echo __('Añadir Entero'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('contenido');
		//echo $this->Form->input('parte_id');
		//echo $this->Form->input('workflowpaso_id');
		//echo $this->Form->input('tipocampos_tipoparte_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Enteros'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Partes'), array('controller' => 'partes', 'action' => 'index')); ?> </li>
		<?php /* <li><?php echo $this->Html->link(__('New Parte'), array('controller' => 'partes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflowpasos'), array('controller' => 'workflowpasos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflowpaso'), array('controller' => 'workflowpasos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipocampos Tipopartes'), array('controller' => 'tipocampos_tipopartes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipocampos Tipoparte'), array('controller' => 'tipocampos_tipopartes', 'action' => 'add')); ?> </li>
		*/?>
	</ul>
</div>

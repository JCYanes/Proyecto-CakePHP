<div class="tipopartes form">
<?php echo $this->Form->create('Tipoparte'); ?>
	<fieldset>
		<legend><?php echo __('Add Tipoparte'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('plantilla');
		echo $this->Form->input('Tipocampo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tipopartes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Valoresdefectos'), array('controller' => 'valoresdefectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Valoresdefecto'), array('controller' => 'valoresdefectos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipocampos'), array('controller' => 'tipocampos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipocampo'), array('controller' => 'tipocampos', 'action' => 'add')); ?> </li>
	</ul>
</div>

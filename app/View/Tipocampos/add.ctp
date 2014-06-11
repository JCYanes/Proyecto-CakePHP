<div class="tipocampos form">
<?php echo $this->Form->create('Tipocampo'); ?>
	<fieldset>
		<legend><?php echo __('Add Tipocampo'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('editable');
		echo $this->Form->input('Tipoparte');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tipocampos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipopartes'), array('controller' => 'tipopartes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoparte'), array('controller' => 'tipopartes', 'action' => 'add')); ?> </li>
	</ul>
</div>

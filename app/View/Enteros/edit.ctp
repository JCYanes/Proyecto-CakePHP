<div class="enteros form">
<?php echo $this->Form->create('Entero'); ?>
	<fieldset>
		<legend><?php echo __('Editar Valores'); ?></legend>
	<?php
		echo $this->Form->input('inicio');
		echo $this->Form->input('final');
		echo $this->Form->input('entradas');
		echo $this->Form->input('salidas');
		debug($this->request);
	?>
	
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
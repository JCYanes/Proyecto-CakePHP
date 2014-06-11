<div class="partes form">
<?php echo $this->Form->create('Parte'); ?>
	<fieldset>
		<legend><?php echo __('Crear parte'); ?></legend>
	<?php
 		echo $this->Form->input('usuariogestor');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Confirmar')); ?>
</div>
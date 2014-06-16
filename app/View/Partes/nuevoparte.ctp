<div class="partes form">
<?php echo $this->Form->create('Parte'); ?>
	<fieldset>
		<legend><?php echo ('Crear parte'); ?></legend>
	<?php
 		echo $this->Form->input('usuariogestor');
	?>
	</fieldset>
<?php echo $this->Form->end(('Confirmar')); ?>
</div>
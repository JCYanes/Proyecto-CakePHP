<div class="partes form">
<?php echo $this->Form->create('Parte'); ?>
	<fieldset>
		<legend><?php echo __('Editar Parte'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('usuariogestor');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listado de Partes'), array('action' => 'indexvendedor')); ?> </li>
	</ul>
</div>
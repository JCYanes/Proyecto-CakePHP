<div class="valoresdefectos form">
<?php echo $this->Form->create('Valoresdefecto'); ?>
	<fieldset>
		<legend><?php echo __('Edit Valoresdefecto'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipoparte_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Valoresdefecto.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Valoresdefecto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Valoresdefectos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipopartes'), array('controller' => 'tipopartes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoparte'), array('controller' => 'tipopartes', 'action' => 'add')); ?> </li>
	</ul>
</div>

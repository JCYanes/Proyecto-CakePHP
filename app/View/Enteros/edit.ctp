<div class="enteros form">
<?php echo $this->Form->create('Entero'); ?>
	<fieldset>
		<legend><?php echo __('Edit Entero'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('contenido');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Entero.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Entero.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Enteros'), array('action' => 'index')); ?></li>
	</ul>
</div>

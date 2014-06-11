<div class="tipofamilias form">
<?php echo $this->Form->create('Tipofamilia'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tipofamilia'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tipofamilia.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tipofamilia.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tipofamilias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipocampos Tipopartes'), array('controller' => 'tipocampos_tipopartes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipocampos Tipoparte'), array('controller' => 'tipocampos_tipopartes', 'action' => 'add')); ?> </li>
	</ul>
</div>

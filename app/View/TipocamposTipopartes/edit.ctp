<div class="tipocamposTipopartes form">
<?php echo $this->Form->create('TipocamposTipoparte'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tipocampos Tipoparte'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tipoparte_id');
		echo $this->Form->input('tipocampo_id');
		echo $this->Form->input('tipofamilia_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TipocamposTipoparte.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TipocamposTipoparte.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tipocampos Tipopartes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipopartes'), array('controller' => 'tipopartes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoparte'), array('controller' => 'tipopartes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipocampos'), array('controller' => 'tipocampos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipocampo'), array('controller' => 'tipocampos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipofamilias'), array('controller' => 'tipofamilias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipofamilia'), array('controller' => 'tipofamilias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enteros'), array('controller' => 'enteros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entero'), array('controller' => 'enteros', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Floats'), array('controller' => 'floats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Float'), array('controller' => 'floats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Textos'), array('controller' => 'textos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Texto'), array('controller' => 'textos', 'action' => 'add')); ?> </li>
	</ul>
</div>

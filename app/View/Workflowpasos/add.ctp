<div class="workflowpasos form">
<?php echo $this->Form->create('Workflowpaso'); ?>
	<fieldset>
		<legend><?php echo __('Add Workflowpaso'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Workflowpasos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Enteros'), array('controller' => 'enteros', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entero'), array('controller' => 'enteros', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Floats'), array('controller' => 'floats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Float'), array('controller' => 'floats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Textos'), array('controller' => 'textos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Texto'), array('controller' => 'textos', 'action' => 'add')); ?> </li>
	</ul>
</div>

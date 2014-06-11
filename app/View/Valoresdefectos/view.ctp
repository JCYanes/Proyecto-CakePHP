<div class="valoresdefectos view">
<h2><?php echo __('Valoresdefecto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($valoresdefecto['Valoresdefecto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipoparte'); ?></dt>
		<dd>
			<?php echo $this->Html->link($valoresdefecto['Tipoparte']['name'], array('controller' => 'tipopartes', 'action' => 'view', $valoresdefecto['Tipoparte']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Valoresdefecto'), array('action' => 'edit', $valoresdefecto['Valoresdefecto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Valoresdefecto'), array('action' => 'delete', $valoresdefecto['Valoresdefecto']['id']), null, __('Are you sure you want to delete # %s?', $valoresdefecto['Valoresdefecto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Valoresdefectos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Valoresdefecto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipopartes'), array('controller' => 'tipopartes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoparte'), array('controller' => 'tipopartes', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="enteros view">
<h2><?php echo __('Entero'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($entero['Entero']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($entero['Entero']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contenido'); ?></dt>
		<dd>
			<?php echo h($entero['Entero']['contenido']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($entero['Entero']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($entero['Entero']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parte'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entero['Parte']['id'], array('controller' => 'partes', 'action' => 'view', $entero['Parte']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Workflowpaso'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entero['Workflowpaso']['name'], array('controller' => 'workflowpasos', 'action' => 'view', $entero['Workflowpaso']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipocampos Tipoparte'); ?></dt>
		<dd>
			<?php echo $this->Html->link($entero['TipocamposTipoparte']['id'], array('controller' => 'tipocampos_tipopartes', 'action' => 'view', $entero['TipocamposTipoparte']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Entero'), array('action' => 'edit', $entero['Entero']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Entero'), array('action' => 'delete', $entero['Entero']['id']), null, __('Are you sure you want to delete # %s?', $entero['Entero']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Enteros'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entero'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partes'), array('controller' => 'partes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parte'), array('controller' => 'partes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflowpasos'), array('controller' => 'workflowpasos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflowpaso'), array('controller' => 'workflowpasos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipocampos Tipopartes'), array('controller' => 'tipocampos_tipopartes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipocampos Tipoparte'), array('controller' => 'tipocampos_tipopartes', 'action' => 'add')); ?> </li>
	</ul>
</div>

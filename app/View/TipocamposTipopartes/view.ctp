<div class="tipocamposTipopartes view">
<h2><?php echo __('Tipocampos Tipoparte'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipocamposTipoparte['TipocamposTipoparte']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipoparte'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tipocamposTipoparte['Tipoparte']['name'], array('controller' => 'tipopartes', 'action' => 'view', $tipocamposTipoparte['Tipoparte']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipocampo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tipocamposTipoparte['Tipocampo']['name'], array('controller' => 'tipocampos', 'action' => 'view', $tipocamposTipoparte['Tipocampo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipofamilia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tipocamposTipoparte['Tipofamilia']['name'], array('controller' => 'tipofamilias', 'action' => 'view', $tipocamposTipoparte['Tipofamilia']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipocampos Tipoparte'), array('action' => 'edit', $tipocamposTipoparte['TipocamposTipoparte']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipocampos Tipoparte'), array('action' => 'delete', $tipocamposTipoparte['TipocamposTipoparte']['id']), null, __('Are you sure you want to delete # %s?', $tipocamposTipoparte['TipocamposTipoparte']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipocampos Tipopartes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipocampos Tipoparte'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Enteros'); ?></h3>
	<?php if (!empty($tipocamposTipoparte['Entero'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Inicio'); ?></th>
		<th><?php echo __('Fin'); ?></th>
		<th><?php echo __('Entrada'); ?></th>
		<th><?php echo __('Salida'); ?></th>
		<th><?php echo __('Formula'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Parte Id'); ?></th>
		<th><?php echo __('Workflowpaso Id'); ?></th>
		<th><?php echo __('Tipocampos Tipoparte Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tipocamposTipoparte['Entero'] as $entero): ?>
		<tr>
			<td><?php echo $entero['id']; ?></td>
			<td><?php echo $entero['name']; ?></td>
			<td><?php echo $entero['inicio']; ?></td>
			<td><?php echo $entero['fin']; ?></td>
			<td><?php echo $entero['entrada']; ?></td>
			<td><?php echo $entero['salida']; ?></td>
			<td><?php echo $entero['formula']; ?></td>
			<td><?php echo $entero['created']; ?></td>
			<td><?php echo $entero['modified']; ?></td>
			<td><?php echo $entero['parte_id']; ?></td>
			<td><?php echo $entero['workflowpaso_id']; ?></td>
			<td><?php echo $entero['tipocampos_tipoparte_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'enteros', 'action' => 'view', $entero['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'enteros', 'action' => 'edit', $entero['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'enteros', 'action' => 'delete', $entero['id']), null, __('Are you sure you want to delete # %s?', $entero['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Entero'), array('controller' => 'enteros', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Floats'); ?></h3>
	<?php if (!empty($tipocamposTipoparte['Float'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Contenido'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Parte Id'); ?></th>
		<th><?php echo __('Workflowpaso Id'); ?></th>
		<th><?php echo __('Tipocampos Tipoparte Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tipocamposTipoparte['Float'] as $float): ?>
		<tr>
			<td><?php echo $float['id']; ?></td>
			<td><?php echo $float['name']; ?></td>
			<td><?php echo $float['contenido']; ?></td>
			<td><?php echo $float['created']; ?></td>
			<td><?php echo $float['modified']; ?></td>
			<td><?php echo $float['parte_id']; ?></td>
			<td><?php echo $float['workflowpaso_id']; ?></td>
			<td><?php echo $float['tipocampos_tipoparte_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'floats', 'action' => 'view', $float['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'floats', 'action' => 'edit', $float['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'floats', 'action' => 'delete', $float['id']), null, __('Are you sure you want to delete # %s?', $float['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Float'), array('controller' => 'floats', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Textos'); ?></h3>
	<?php if (!empty($tipocamposTipoparte['Texto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Contenido'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Parte Id'); ?></th>
		<th><?php echo __('Workflowpaso Id'); ?></th>
		<th><?php echo __('Tipocampos Tipoparte Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tipocamposTipoparte['Texto'] as $texto): ?>
		<tr>
			<td><?php echo $texto['id']; ?></td>
			<td><?php echo $texto['name']; ?></td>
			<td><?php echo $texto['contenido']; ?></td>
			<td><?php echo $texto['created']; ?></td>
			<td><?php echo $texto['modified']; ?></td>
			<td><?php echo $texto['parte_id']; ?></td>
			<td><?php echo $texto['workflowpaso_id']; ?></td>
			<td><?php echo $texto['tipocampos_tipoparte_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'textos', 'action' => 'view', $texto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'textos', 'action' => 'edit', $texto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'textos', 'action' => 'delete', $texto['id']), null, __('Are you sure you want to delete # %s?', $texto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Texto'), array('controller' => 'textos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

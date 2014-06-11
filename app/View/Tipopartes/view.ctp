<div class="tipopartes view">
<h2><?php echo __('Tipoparte'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipoparte['Tipoparte']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tipoparte['Tipoparte']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plantilla'); ?></dt>
		<dd>
			<?php echo h($tipoparte['Tipoparte']['plantilla']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipoparte'), array('action' => 'edit', $tipoparte['Tipoparte']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipoparte'), array('action' => 'delete', $tipoparte['Tipoparte']['id']), null, __('Are you sure you want to delete # %s?', $tipoparte['Tipoparte']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipopartes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoparte'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Valoresdefectos'), array('controller' => 'valoresdefectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Valoresdefecto'), array('controller' => 'valoresdefectos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipocampos'), array('controller' => 'tipocampos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipocampo'), array('controller' => 'tipocampos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Valoresdefectos'); ?></h3>
	<?php if (!empty($tipoparte['Valoresdefecto'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tipoparte Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tipoparte['Valoresdefecto'] as $valoresdefecto): ?>
		<tr>
			<td><?php echo $valoresdefecto['id']; ?></td>
			<td><?php echo $valoresdefecto['tipoparte_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'valoresdefectos', 'action' => 'view', $valoresdefecto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'valoresdefectos', 'action' => 'edit', $valoresdefecto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'valoresdefectos', 'action' => 'delete', $valoresdefecto['id']), null, __('Are you sure you want to delete # %s?', $valoresdefecto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Valoresdefecto'), array('controller' => 'valoresdefectos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Tipocampos'); ?></h3>
	<?php if (!empty($tipoparte['Tipocampo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Editable'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tipoparte['Tipocampo'] as $tipocampo): ?>
		<tr>
			<td><?php echo $tipocampo['id']; ?></td>
			<td><?php echo $tipocampo['name']; ?></td>
			<td><?php echo $tipocampo['descripcion']; ?></td>
			<td><?php echo $tipocampo['editable']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tipocampos', 'action' => 'view', $tipocampo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tipocampos', 'action' => 'edit', $tipocampo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tipocampos', 'action' => 'delete', $tipocampo['id']), null, __('Are you sure you want to delete # %s?', $tipocampo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tipocampo'), array('controller' => 'tipocampos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

<div class="tipocampos view">
<h2><?php echo __('Tipocampo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipocampo['Tipocampo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tipocampo['Tipocampo']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($tipocampo['Tipocampo']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Editable'); ?></dt>
		<dd>
			<?php echo h($tipocampo['Tipocampo']['editable']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipocampo'), array('action' => 'edit', $tipocampo['Tipocampo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipocampo'), array('action' => 'delete', $tipocampo['Tipocampo']['id']), null, __('Are you sure you want to delete # %s?', $tipocampo['Tipocampo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipocampos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipocampo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipopartes'), array('controller' => 'tipopartes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoparte'), array('controller' => 'tipopartes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tipopartes'); ?></h3>
	<?php if (!empty($tipocampo['Tipoparte'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Plantilla'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tipocampo['Tipoparte'] as $tipoparte): ?>
		<tr>
			<td><?php echo $tipoparte['id']; ?></td>
			<td><?php echo $tipoparte['name']; ?></td>
			<td><?php echo $tipoparte['plantilla']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tipopartes', 'action' => 'view', $tipoparte['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tipopartes', 'action' => 'edit', $tipoparte['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tipopartes', 'action' => 'delete', $tipoparte['id']), null, __('Are you sure you want to delete # %s?', $tipoparte['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tipoparte'), array('controller' => 'tipopartes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

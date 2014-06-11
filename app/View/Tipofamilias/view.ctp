<div class="tipofamilias view">
<h2><?php echo __('Tipofamilia'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipofamilia['Tipofamilia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tipofamilia['Tipofamilia']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipofamilia'), array('action' => 'edit', $tipofamilia['Tipofamilia']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipofamilia'), array('action' => 'delete', $tipofamilia['Tipofamilia']['id']), null, __('Are you sure you want to delete # %s?', $tipofamilia['Tipofamilia']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipofamilias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipofamilia'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipocampos Tipopartes'), array('controller' => 'tipocampos_tipopartes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipocampos Tipoparte'), array('controller' => 'tipocampos_tipopartes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tipocampos Tipopartes'); ?></h3>
	<?php if (!empty($tipofamilia['TipocamposTipoparte'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tipoparte Id'); ?></th>
		<th><?php echo __('Tipocampo Id'); ?></th>
		<th><?php echo __('Tipofamilia Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tipofamilia['TipocamposTipoparte'] as $tipocamposTipoparte): ?>
		<tr>
			<td><?php echo $tipocamposTipoparte['id']; ?></td>
			<td><?php echo $tipocamposTipoparte['tipoparte_id']; ?></td>
			<td><?php echo $tipocamposTipoparte['tipocampo_id']; ?></td>
			<td><?php echo $tipocamposTipoparte['tipofamilia_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tipocampos_tipopartes', 'action' => 'view', $tipocamposTipoparte['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tipocampos_tipopartes', 'action' => 'edit', $tipocamposTipoparte['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tipocampos_tipopartes', 'action' => 'delete', $tipocamposTipoparte['id']), null, __('Are you sure you want to delete # %s?', $tipocamposTipoparte['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tipocampos Tipoparte'), array('controller' => 'tipocampos_tipopartes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

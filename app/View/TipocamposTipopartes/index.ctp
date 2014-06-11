<div class="tipocamposTipopartes index">
	<h2><?php echo __('Tipocampos Tipopartes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipoparte_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipocampo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipofamilia_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tipocamposTipopartes as $tipocamposTipoparte): ?>
	<tr>
		<td><?php echo h($tipocamposTipoparte['TipocamposTipoparte']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tipocamposTipoparte['Tipoparte']['name'], array('controller' => 'tipopartes', 'action' => 'view', $tipocamposTipoparte['Tipoparte']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tipocamposTipoparte['Tipocampo']['name'], array('controller' => 'tipocampos', 'action' => 'view', $tipocamposTipoparte['Tipocampo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tipocamposTipoparte['Tipofamilia']['name'], array('controller' => 'tipofamilias', 'action' => 'view', $tipocamposTipoparte['Tipofamilia']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tipocamposTipoparte['TipocamposTipoparte']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tipocamposTipoparte['TipocamposTipoparte']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tipocamposTipoparte['TipocamposTipoparte']['id']), null, __('Are you sure you want to delete # %s?', $tipocamposTipoparte['TipocamposTipoparte']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Tipocampos Tipoparte'), array('action' => 'add')); ?></li>
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

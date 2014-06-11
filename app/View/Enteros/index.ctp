<div class="enteros index">
	<h2><?php echo __('Enteros'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('contenido'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('parte_id'); ?></th>
			<th><?php echo $this->Paginator->sort('workflowpaso_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipocampos_tipoparte_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($enteros as $entero): ?>
	<tr>
		<td><?php echo h($entero['Entero']['id']); ?>&nbsp;</td>
		<td><?php echo h($entero['Entero']['name']); ?>&nbsp;</td>
		<td><?php echo h($entero['Entero']['contenido']); ?>&nbsp;</td>
		<td><?php echo h($entero['Entero']['created']); ?>&nbsp;</td>
		<td><?php echo h($entero['Entero']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($entero['Parte']['id'], array('controller' => 'partes', 'action' => 'view', $entero['Parte']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($entero['Workflowpaso']['name'], array('controller' => 'workflowpasos', 'action' => 'view', $entero['Workflowpaso']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($entero['TipocamposTipoparte']['id'], array('controller' => 'tipocampos_tipopartes', 'action' => 'view', $entero['TipocamposTipoparte']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $entero['Entero']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $entero['Entero']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $entero['Entero']['id']), null, __('Are you sure you want to delete # %s?', $entero['Entero']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Entero'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Partes'), array('controller' => 'partes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parte'), array('controller' => 'partes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workflowpasos'), array('controller' => 'workflowpasos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workflowpaso'), array('controller' => 'workflowpasos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipocampos Tipopartes'), array('controller' => 'tipocampos_tipopartes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipocampos Tipoparte'), array('controller' => 'tipocampos_tipopartes', 'action' => 'add')); ?> </li>
	</ul>
</div>

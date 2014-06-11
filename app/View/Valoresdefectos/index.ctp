<div class="valoresdefectos index">
	<h2><?php echo __('Valoresdefectos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipoparte_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($valoresdefectos as $valoresdefecto): ?>
	<tr>
		<td><?php echo h($valoresdefecto['Valoresdefecto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($valoresdefecto['Tipoparte']['name'], array('controller' => 'tipopartes', 'action' => 'view', $valoresdefecto['Tipoparte']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $valoresdefecto['Valoresdefecto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $valoresdefecto['Valoresdefecto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $valoresdefecto['Valoresdefecto']['id']), null, __('Are you sure you want to delete # %s?', $valoresdefecto['Valoresdefecto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Valoresdefecto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipopartes'), array('controller' => 'tipopartes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipoparte'), array('controller' => 'tipopartes', 'action' => 'add')); ?> </li>
	</ul>
</div>

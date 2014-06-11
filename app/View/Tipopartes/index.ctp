<div class="tipopartes index">
	<h2><?php echo __('Tipopartes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('plantilla'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tipopartes as $tipoparte): ?>
	<tr>
		<td><?php echo h($tipoparte['Tipoparte']['id']); ?>&nbsp;</td>
		<td><?php echo h($tipoparte['Tipoparte']['name']); ?>&nbsp;</td>
		<td><?php echo h($tipoparte['Tipoparte']['plantilla']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tipoparte['Tipoparte']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tipoparte['Tipoparte']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tipoparte['Tipoparte']['id']), null, __('Are you sure you want to delete # %s?', $tipoparte['Tipoparte']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tipoparte'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Valoresdefectos'), array('controller' => 'valoresdefectos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Valoresdefecto'), array('controller' => 'valoresdefectos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipocampos'), array('controller' => 'tipocampos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipocampo'), array('controller' => 'tipocampos', 'action' => 'add')); ?> </li>
	</ul>
</div>

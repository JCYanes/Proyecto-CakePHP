<div class="roles view">
<h2><?php echo __('Role'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($role['Role']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($role['Role']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Rol'), array('action' => 'edit', $role['Role']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Rol'), array('action' => 'delete', $role['Role']['id']), null, __('Estas seguro que quieres borrar  # %s?', $role['Role']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Lista Roles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Rol'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Usuarios'); ?></h3>
	<?php if (!empty($role['Usuario'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Role Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($role['Usuario'] as $usuario): ?>
		<tr>
			<td><?php echo $usuario['id']; ?></td>
			<td><?php echo $usuario['username']; ?></td>
			<td><?php echo $usuario['password']; ?></td>
			<td><?php echo $usuario['created']; ?></td>
			<td><?php echo $usuario['role_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'users', 'action' => 'view', $usuario['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'users', 'action' => 'edit', $usuario['id'])); ?>
				<?php echo $this->Form->postLink(__('Borrar'), array('controller' => 'users', 'action' => 'delete', $usuario['id']), null, __('Are you sure you want to delete # %s?', $usuario['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

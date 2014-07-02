<div class="users view">
<h2><?php echo __('Usuario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usuario['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo h($usuario['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contraseña'); ?></dt>
		<dd>
			<?php echo h($usuario['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creado'); ?></dt>
		<dd>
			<?php echo h($usuario['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rol'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usuario['Role']['name'], array('controller' => 'roles', 'action' => 'view', $usuario['Role']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Usuario'), array('action' => 'edit', $usuario['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Borrar Usuario'), array('action' => 'delete', $usuario['User']['id']), null, __('Are you sure you want to delete # %s?', $usuario['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Rol'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>

<div class="partes view">
<h2><?php echo __('Parte'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($parte['Parte']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creado'); ?></dt>
		<dd>
			<?php echo h($parte['Parte']['created']); ?>&nbsp;
		</dd>
		<dt><?php echo __('Firmado'); ?></dt>
		<dd>
			<?php if(($parte['Parte']['firmado'])=== true){
			  echo h("El parte ha sido firmado");
			  } else{
			   echo h("El parte no ha sido firmado");
			   }?>&nbsp;
		</dd>
		<dt><?php echo __('Usuario Gestor'); ?></dt>
		<dd>
			<?php echo h($parte['Usuario']['username']); ?>&nbsp;
		</dd>
		<dt><?php echo __('Tipo de parte'); ?></dt>
		<dd>
			<?php echo h($parte['Tipoparte']['name']); ?>&nbsp;
		</dd>
		
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Listado de Partes'), array('action' => 'indexvendedor')); ?> </li>
	</ul>
</div>
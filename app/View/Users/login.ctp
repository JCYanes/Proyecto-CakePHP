<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User',array( 'controller' => 'users', 'action' => 'login' )); ?>
    <fieldset>
        <legend>
            <?php echo __('Introduzca su usuario y contraseña'); ?>
        </legend>
	</fieldset>

	<div id="center">
		<?php 
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->end(('Login')); 
		?>
	</div>


</div>

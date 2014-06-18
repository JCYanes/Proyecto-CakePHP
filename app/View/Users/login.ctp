<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User',array( 'controller' => 'users', 'action' => 'login' )); ?>
    <fieldset>
        <legend>
            <?php echo __('Introduzca su usuario y contraseña'); ?>
        </legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(('Login')); ?>
</div>

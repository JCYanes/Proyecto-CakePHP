<?php
/**
 *
 *
*	Copyright (C) 2014 Jésica Carballo Yanes
*
*    This program is free software: you can redistribute it and/or modify
*    it under the terms of the GNU Affero General Public License as
*    published by the Free Software Foundation, either version 3 of the
*    License, or (at your option) any later version.
*
*    This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*    GNU Affero General Public License for more details.
*
*    You should have received a copy of the GNU Affero General Public License
*   along with this program.  If not, see <http://www.gnu.org/licenses/>.
**/

//$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());
$cakeDescription = __d('Estacion','Estacion de Servicios');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('login'); //('cake.generic');//Ruta del css

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription,'https://github.com/JCYanes/Proyecto-CakePHP'); ?></h1>
		</div>
		<div id="content">

		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
		
		</div>
		
		<div id="footer">
		  <div class="spanfooter">
		    <p>
				  <?php echo $this->Html->link('Licencia: AGPL-3.0','http://opensource.org/licenses/AGPL-3.0');?>
			  </p>
		    
		    <p>
			<?php echo $this->Html->link($cakeVersion,'http://cakephp.org/'); ?>
		    </p>
		  </div>

		</div>
	</div>
</body>
</html>

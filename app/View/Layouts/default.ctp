<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset();
	echo $this->Html->charset();
    echo $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css');
    echo $this->Html->script('https://code.jquery.com/jquery-3.2.1.slim.min.js');
    echo $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js');
	    echo $this->Html->script('https://use.fontawesome.com/14fae464fb.js');?>

	<title>Jobbörse</title>
	<?php
		echo $this->Html->meta('icon');
/*		echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script'); */
?>
</head>
<body>
    <!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;>
		<span class="navbar-brand "><h4>Jobbörse</h4	></span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse ml-2" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<?php  echo $this->Html->link('Home', array('controller' => 'jobs', 'action' => 'index'), array('class' => 'nav-link')); ?>
				</li>
			</ul>
			<span class="navbar-text">CakePHP</span>
		</div>
	</nav>
	<div id="container" style="padding-top: 15px;">
		<div id="content">
			<?php echo $this->Flash->render(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer" class="card-footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'https://cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
		</div>
	</div>
</body>
</html>

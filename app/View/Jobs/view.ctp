<!-- File: /app/View/Jobs/view.ctp -->

<div class="container bg-light">
	<h1><?php echo h($job['Job']['title']); ?></h1>
	<p><small>Created: <?php echo $job['Job']['created']; ?></small></p>
	<p><?php echo nl2br(h($job['Job']['description'])); ?></p>
	<?php if ($job['Job']['website']!="") { ?>
	<p>Weitere Informationen unter: <?php echo $this->Html->link(
					$job['Job']['website'],
					$job['Job']['website'],
					array('class' => 'button', 'target' => '_blank')
				  ); 
	} ?>
	</p>	
	<h3>Kontakt:</h3>
	<p>
		<i class="fa fa-id-card-o fa-fw" aria-hidden="true"></i>
		<?php echo h($job['Job']['contact_name']); ?></br>
		<i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i> 
		<?php echo $this->Html->link($job['Job']['contact_mail'], 'mailto:' . $job['Job']['contact_mail']); ?></br>
		<?php if ($job['Job']['contact_mobile']!="") { ?>
		<i class="fa fa-phone fa-fw" aria-hidden="true"></i> <?php echo h($job['Job']['contact_mobile']); 
		} ?>
	</p>
</div>
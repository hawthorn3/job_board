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
		<?php echo $this->Html->link($job['Job']['contact_mail'],
									'mailto:' . $job['Job']['contact_mail']); ?></br>
		<?php if ($job['Job']['contact_mobile']!="") { ?>
		<i class="fa fa-phone fa-fw" aria-hidden="true"></i>
		<?php echo h($job['Job']['contact_mobile']);
		} ?>
	</p>

	<?php
	// edit and delete operations are only available if the user has followed
	// the link with the token from the e-mail
	if ($this->request->query('token') != '') {
		$token = '?token='.$this->request->query('token');
	?>
	<p>
		<h6>Aktionen:</h6>
		<?php
			echo $this->Html->link(
						'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
						array('action' => 'edit', $job['Job']['id'], $token),
						array('escape' => false, 'class' => 'btn btn-outline-dark  btn-sm mr-2')
);
					// Creates an HTML link, but access the URL using method POST.
			echo $this->Form->postLink(
						'<i class="fa fa-trash" aria-hidden="true"></i>',
						array('action' => 'delete', $job['Job']['id'], $token),
						array('escape' => false, 'class' => 'btn btn-outline-dark  btn-sm',
									'confirm' => 'Wollen Sie diesen Eintrag wirklich löschen?')
				);
	}
	echo '</p>';
		?>
</div>

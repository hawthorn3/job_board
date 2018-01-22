<!-- File: /app/View/Jobs/edit.ctp -->

<div class="container">

	<?php
	if ($this->request->query('token') != '') {
		$token = '?token='.$this->request->query('token');
	} else {
		$token='';
	}
	echo $this->Html->link(
	    '<i class="fa fa-arrow-circle-left mr-1" aria-hidden="true"></i> Zurück zur Jobansicht',
	    array('controller' => 'jobs',
						'action' => 'view/'.$id.$token),
			array('escape' => false, 'class' => 'btn btn-info mb-2', 'style' => 'color: #fff;')
	); ?>

	<fieldset>
	<legend><?php echo __('Job bearbeiten'); ?></legend>
	<?php
	echo $this->Form->create('Job');
	echo $this->Form->input('title', array('label' => 'Titel', 'class' => 'form-control mb-2'));
	echo $this->Form->input('description', array('rows' => '3', 'label' => 'Beschreibung', 'class' => 'form-control mb-2'));
	echo $this->Form->input('website', array('type' => 'url', 'label' => 'URL', 'class' => 'form-control mb-2'));
	echo $this->Form->input('contact_name', array('label' => 'Kontaktperson', 'class' => 'form-control mb-2'));
	echo $this->Form->input('contact_mail', array('type' => 'email', 'label' => 'E-Mail', 'class' => 'form-control mb-2'));
	echo $this->Form->input('contact_mobile', array('type' => 'tel', 'label' => 'Telefon', 'class' => 'form-control mb-2'));
	echo $this->Form->input('id', array('type' => 'hidden'));
	//generates a Submit button
	echo $this->Form->end(array('label' => 'Änderungen speichern', 'class' => 'btn btn-primary mb-2'));
	?>
	</fieldset>
</div>

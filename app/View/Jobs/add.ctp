<!-- File: /app/View/Jobs/add.ctp -->

<div class="container">	
	<fieldset>
	<legend><?php echo __('Neuer Job anlegen'); ?></legend>
	<?php
	echo $this->Form->create('Job');
	echo $this->Form->input('title', array('label' => 'Titel', 'class' => 'form-control mb-3'));
	echo $this->Form->input('description', array('rows' => '3', 'label' => 'Beschreibung', 'class' => 'form-control mb-3'));
	echo $this->Form->input('website', array('label' => 'URL', 'class' => 'form-control mb-3'));
	echo $this->Form->input('contact_name', array('label' => 'Kontaktperson', 'class' => 'form-control mb-3'));
	echo $this->Form->input('contact_mail', array('type' => 'email', 'label' => 'E-Mail', 'class' => 'form-control mb-3'));
	echo $this->Form->input('contact_mobile', array('type' => 'tel', 'label' => 'Telefon', 'class' => 'form-control mb-3'));
	//generates a Submit button
	echo $this->Form->end(array('label' => 'Job speichern', 'class' => 'btn btn-primary mb-2'));
	?>
	</fieldset>
</div>
<!-- File: /app/View/Jobs/edit.ctp -->

<div class="container">	
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
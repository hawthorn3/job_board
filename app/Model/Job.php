<!-- File: /app/Model/Job.php -->

<?php

class Job extends AppModel {
	public $validate = array(
        'title' => array(
			'rule' => 'notBlank',
			'required' => true
        ),
        'description' => array(
			'rule' => 'notBlank',
            'required' => true
        ),
		'website' => array(
			'rule' => 'notBlank',	
			'allowEmpty' => true,
			'required' => true
        ),
        'contact_name' => array(
			'rule' => 'notBlank',
            'required' => true
        ),
		'contact_mail' => array(
			'rule' => 'email',
            'required' => true
        ),
        'contact_mobile' => array(
			'rule' => 'notBlank',	
			'allowEmpty' => true,
			'required' => true
        )		
    );
}

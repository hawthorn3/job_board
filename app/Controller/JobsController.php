<!-- File: /app/Controller/JobsController.php -->

<?php

class JobsController extends AppController {
	public $helpers = array('Html', 'Form', 'Flash');

	public function index() {
		$this->set('jobs', $this->Job->find('all'));
	}

	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Ungültiger Job'));
		}

		$job = $this->Job->findById($id);
		if (!$job) {
			throw new NotFoundException(__('Ungültiger Job'));
		}
		$this->set('job', $job);
	}
/*
	public function send_mail() {
        $message = 'Hallo,/n Ihre Anzeige kann unter den folgenden Link bearbeitet werden: ';
				$link = $this->request->host() . $this->webroot .'jobs/view/'.
						$this->request->data['Job']['id'] .'?token='.
						$this->request->data['Job']['token'];
        App::uses('CakeEmail', 'Network/Email');
        $Email = new CakeEmail('gmail');
        $Email->from('jobs@job-board.com');
        $Email->to($this->request->data['Job']['contact_mail']);
        $Email->subject('Ihr Jobangebot wurde angelegt.');
		$Email->send($message . $link);
	}
*/

	public function add() {
		// if the HTTP method of the request was POST, it saves the data using the Job model
		if ($this->request->is('post')) {
			$this->Job->create();
			if ($this->Job->save($this->request->data)) {
				$this->Flash->success(__('Der Job wurde erfolgreich angelegt.'));
			// $this->send_mail();
				$job = $this->Job->findById($this->Job->getInsertId());
				// E-Mail contents
				$this->Session->setFlash('Sie können Ihre Jobanzeige unter den folgenden
						Link bearbeiten oder löschen: '.$this->request->host() .
						$this->webroot .'jobs/view/'. $job['Job']['id'] .'?token='.
						$job['Job']['token'],'default',array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('Der Job konnte nicht gespeichert werden.'));
		}
	}

	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Ungültiger Job'));
		}

		$job = $this->Job->findById($id);
		if (!$job) {
			throw new NotFoundException(__('Ungültiger Job'));
		}

		$this->set('id', $id);
		if ($this->request->is(array('post', 'put'))) {
			$this->Job->id = $id;
			// edit is permitted only if token is correct
			if ($job['Job']['token'] == $this->request->query('token')) {
				if ($this->Job->save($this->request->data)) {
					$this->Flash->success(__('Der Eintrag wurde aktualisiert.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Flash->error(__('Der Eintrag konnte nicht aktualisiert werden.'));
			} else {
				$this->Flash->error(__('Zugriff verweigert.'));
			}
		}

		if (!$this->request->data) {
			$this->request->data = $job;
		}
	}

	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		$job = $this->Job->findById($id);
		// delete is permitted only if token is corrent
		if ($job['Job']['token'] == $this->request->query('token')) {
			if ($this->Job->delete($id)) {
				$this->Flash->success(
					__('Der Job mit ID: %s wurde gelöscht.', h($id))
				);
			} else {
				$this->Flash->error(
					__('Der Job mit ID: %s konnte nicht gelöscht werden.', h($id))
				);
			}
		} else {
				$this->Flash->error(__('Zugriff verweigert.'));
		}

		return $this->redirect(array('action' => 'index'));
	}


}

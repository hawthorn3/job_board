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

	public function add() {
		// if the HTTP method of the request was POST, it saves the data using the Job model
		if ($this->request->is('post')) {
			$this->Job->create();
			if ($this->Job->save($this->request->data)) {
				$this->Flash->success(__('Der Job wurde erfolgreich angelegt.'));
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

		if ($this->request->is(array('post', 'put'))) {
			$this->Job->id = $id;
			if ($this->Job->save($this->request->data)) {
				$this->Flash->success(__('Der Eintrag wurde aktualisiert.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Flash->error(__('Der Eintrag konnte nicht aktualisiert werden.'));
		}

		if (!$this->request->data) {
			$this->request->data = $job;
		}
	}

	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->Job->delete($id)) {
			$this->Flash->success(
				__('Der Job mit ID: %s wurde gelöscht.', h($id))
			);
		} else {
			$this->Flash->error(
				__('Der Job mit ID: %s konnte nicht gelöscht werden.', h($id))
			);
		}

		return $this->redirect(array('action' => 'index'));
	}
}

<?php
App::uses('AppController', 'Controller');
/**
 * Visits Controller
 *
 * @property Visit $Visit
 */
class VisitsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Visit->recursive = 0;
		$this->set('visits', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Visit->id = $id;
		if (!$this->Visit->exists()) {
			throw new NotFoundException(__('Invalid visit'));
		}
		$this->set('visit', $this->Visit->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Visit->create();
			if ($this->Visit->save($this->request->data)) {
				$this->Session->setFlash(__('The visit has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The visit could not be saved. Please, try again.'));
			}
		}
		$companies = $this->Visit->Company->find('list');
		$patients = $this->Visit->Patient->find('list');
		$providers = $this->Visit->Provider->find('list');
		$facilities = $this->Visit->Facility->find('list');
		$visitStatuses = $this->Visit->VisitStatus->find('list');
		$payrollOverrideCodes = $this->Visit->PayrollOverrideCode->find('list');
		$hasAttachments = $this->Visit->HasAttachment->find('list');
		$this->set(compact('companies', 'patients', 'providers', 'facilities', 'visitStatuses', 'payrollOverrideCodes', 'hasAttachments'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Visit->id = $id;
		if (!$this->Visit->exists()) {
			throw new NotFoundException(__('Invalid visit'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Visit->save($this->request->data)) {
				$this->Session->setFlash(__('The visit has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The visit could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Visit->read(null, $id);
		}
		$companies = $this->Visit->Company->find('list');
		$patients = $this->Visit->Patient->find('list');
		$providers = $this->Visit->Provider->find('list');
		$facilities = $this->Visit->Facility->find('list');
		$visitStatuses = $this->Visit->VisitStatus->find('list');
		$payrollOverrideCodes = $this->Visit->PayrollOverrideCode->find('list');
		$hasAttachments = $this->Visit->HasAttachment->find('list');
		$this->set(compact('companies', 'patients', 'providers', 'facilities', 'visitStatuses', 'payrollOverrideCodes', 'hasAttachments'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Visit->id = $id;
		if (!$this->Visit->exists()) {
			throw new NotFoundException(__('Invalid visit'));
		}
		if ($this->Visit->delete()) {
			$this->Session->setFlash(__('Visit deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Visit was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

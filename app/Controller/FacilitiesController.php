<?php
class FacilitiesController extends AppController {
	
	public $uses = array('State','Region','Facility','Provider');
	
	public function index() {
		if ($this->request->is('post')) {
			
			// Add search criteria
			$conditions = array();
			if (isset($this->request->data['field']) && !empty($this->request->data['field'])) {
				$conditions['Facility.name LIKE'] =  $this->request->data['field'].'%';
			}
			if (isset($this->request->data['states']) && !empty($this->request->data['states'])) {
				$conditions['Facility.state'] =  $this->request->data['states'];
			}
			if (isset($this->request->data['regions']) && !empty($this->request->data['regions'])) {
				$conditions['Facility.region_id'] =  $this->request->data['regions'];
			}
			if (!isset($this->request->data['inactive']) && !empty($this->request->data['inactive'])) {
				$conditions['Facility.status'] =  1;
			}
			
			$facilities = $this->Facility->find('all', array('conditions' => $conditions,'order'=> array('Facility.name ASC')));
		} else {
			$facilities = $this->Facility->find('all',array('conditions' => array('status' => 1),'order'=>array('Facility.name ASC')));
		}
		
		// Facilities list
		$states = $this->State->find('list', array('fields' => array('State.state_code', 'State.state_name')));
		$regions = $this->Region->find('list', array('fields' => array('Region.id', 'Region.name')));
		
		$this->set(compact('states','regions','facilities'));
	}
	
	public function edit($id=0) {
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Facility->save($this->request->data)) {
				$this->Session->setFlash("<span>Facility Information has been saved.</span>", 'default', array('class' => 'flash_success'));
				$this->redirect(array('action' => 'index'));
			}
		} else {
			$this->request->data = $this->Facility->read(null, $id);
		}
		$states = $this->State->find('list', array('fields' => array('State.state_code', 'State.state_name')));
		$regions = $this->Region->find('list', array('fields' => array('Region.id', 'Region.name')));
		$providerRS = $this->Provider->find('all', array('fields' => array('Provider.id', 'Provider.first_name','Provider.last_name')));
		// Reformat the providers
		$providers = array(); 
		foreach ($providerRS as $key => $value) {
			$providers[$key] = $value['Provider']['first_name'] . ' ' . $value['Provider']['last_name'];
		}
		$facilityTypes = array();
		$status = $this->status;
		$this->set(compact('states','regions','facilityTypes','status', 'providers'));
	}
}
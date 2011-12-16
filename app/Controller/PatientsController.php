<?php
class PatientsController extends AppController {
	
	public $uses = array('Facility', 'Patient','Insurance','Region');
	public $servicesStatus = array('Active'=>'Active', 'D/C'=>'D/C','Deceased' => 'Deceased');
	public $faceStatus = array('None'=>'None', 'Complete'=>'Complete','Incomplete' => 'Incomplete');
	
	public function index() {

		if ($this->request->is('post')) {
		
			// Add search criteria
			$conditions = array();
			if (isset($this->request->data['searchfield']) && !empty($this->request->data['searchfield'])) {
				$conditions['Patient.last_name LIKE'] =  $this->request->data['searchfield'].'%';
			}
			if (isset($this->request->data['regions']) && !empty($this->request->data['regions'])) {
				$conditions['Facility.region_id'] =  $this->request->data['regions'];
			}
			if (isset($this->request->data['facilities']) && !empty($this->request->data['facilities'])) {
				$conditions['Patient.facility_id'] =  $this->request->data['facilities'];
			}
			if (!isset($this->request->data['inactive']) && !empty($this->request->data['inactive'])) {
				$conditions['Patient.status'] =  1;
			}
		
			$patients = $this->Patient->find('all', array('conditions' => $conditions,'order'=> array('Facility.name ASC')));
		} else {
			$patients = $this->Patient->find('all',array('order'=>array('Patient.last_name ASC','Patient.first_name ASC')));
		}
		
		// Facilities list
		$facilities = $this->Facility->find('list', array('fields' => array('Facility.id', 'Facility.name'),
        												 'conditions' => array('Facility.status =' => 1),));
	
		$regions = $this->Region->find('list', array('fields' => array('Region.id', 'Region.name')));
		$this->set(compact('facilities','patients','regions'));
	}
	
	public function edit($id=0) {
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['Patient']['company_id'] = 2;
			if ($this->Patient->save($this->request->data)) {
				$this->Session->setFlash("<span>Patient Information has been saved.</span>", 'default', array('class' => 'flash_success'));
				$this->redirect(array('action' => 'index'));
			}
		} else {
			$this->request->data = $this->Patient->read(null, $id);
		}
		
		$gender = $this->gender;
		$status = $this->status;
		$servicesStatus = $this->servicesStatus;
		$faceStatus = $this->faceStatus;
		// Facilities list
		$facilities = $this->Facility->find('list', array('fields' => array('Facility.id', 'Facility.name'),
				'conditions' => array('Facility.status =' => 1),));
		
		$insurance = $this->Insurance->find('list', array('fields'	=> array('Insurance.id', 'Insurance.name'),
					'conditions'	=> array('Insurance.visable' => 1)));
		
		$this->set(compact('facilities','gender','status','servicesStatus','insurance','faceStatus'));
	}
}
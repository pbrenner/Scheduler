<?php
class PatientsController extends AppController {
	
	public $uses = array('Facility', 'Patient','Insurance','Region','Provider');
	public $servicesStatus = array('Active'=>'Active', 'D/C'=>'D/C','Deceased' => 'Deceased');
	public $faceStatus = array('None'=>'None', 'Complete'=>'Complete','Incomplete' => 'Incomplete');
	
	public function index() {

		$searchFld = "";
		if ($this->request->is('post')) {
		
			// Add search criteria
			$conditions = array();
			$searchFld = $this->request->data['searchFld'];
			if (isset($this->request->data['searchFld']) && !empty($this->request->data['searchFld'])) {
				$conditions['OR'] = array(
						array ("Patient.first_name like " => '%'.$this->request->data['searchFld'].'%'),
						array ("Patient.last_name like" => '%'.$this->request->data['searchFld'].'%')
				);
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
		
		$providerRS = $this->Provider->find('all', array('fields' => array('Provider.id', 'Provider.first_name','Provider.last_name')));
		// Reformat the providers
		$providers = array(); 
		foreach ($providerRS as $key => $value) {
			$providers[$key] = $value['Provider']['first_name'] . ' ' . $value['Provider']['last_name'];
		}
	
		$regions = $this->Region->find('list', array('fields' => array('Region.id', 'Region.name')));
		$this->set(compact('facilities','patients','regions','providers','searchFld'));
	}
	
	public function edit($id=0) {
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['Patient']['company_id'] = 1;
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
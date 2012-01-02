<?php
class FacilitiesController extends AppController {
	
	public $uses = array('State','Region','Facility','Provider');
	
	public function index() {
		$searchFld = "";
		if ($this->request->is('post')) {
			
			$searchFld = $this->request->data['searchFld'];
			// Add search criteria
			$filter = array();
			if (isset($this->request->data['searchFld']) && !empty($this->request->data['searchFld'])) {
				$filter['Facility.name LIKE'] =  '%'.$this->request->data['searchFld'].'%';
			}
			
			$facilities = $this->Facility->find('all', array('conditions' => $filter,'order'=> array('Facility.name ASC')));
		} else {
			$facilities = $this->Facility->find('all',array('conditions' => array('status' => 1),'order'=>array('Facility.name ASC')));
		}
		
		// Facilities list
		
		$db = $this->Facility->getDataSource();
		$subQuery = $db->buildStatement(
    		array(
        	'fields'     => array('distinct Facility.state'),
        	'table'      => $db->fullTableName($this->Facility),
        	'alias'      => 'Facility',
        	'limit'      => null,
        	'offset'     => null,
        	'joins'      => array(),
        	'conditions' => null,
        	'order'      => null,
        	'group'      => null
    		),
    		$this->Facility
		);
		$subQuery = 'State.state_code IN (' . $subQuery . ') ';
		$subQueryExpression = $db->expression($subQuery);
		
		$conditions[] = $subQueryExpression;
		
		$states = $this->State->find('list', array('fields' => array('State.state_code', 'State.state_name'),'conditions'=>$conditions));
		$regions = $this->Region->find('list', array('fields' => array('Region.name', 'Region.name')));
		
		$this->set(compact('states','regions','facilities','searchFld'));
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
		//$regions = $this->Region->find('list', array('fields' => array('Region.id', 'Region.name')));
		$providerRS = $this->Provider->find('all', array('fields' => array('Provider.id', 'Provider.first_name','Provider.last_name')));
		// Reformat the providers
		$providers = array(); 
		foreach ($providerRS as $key => $value) {
			$providers[$key] = $value['Provider']['first_name'] . ' ' . $value['Provider']['last_name'];
		}
		$facilityTypes = array();
		$status = $this->status;
		$this->set('regions', $this->Provider->Region->find('list'));
		
		$this->set(compact('states','regions','facilityTypes','status', 'providers'));
	}
}
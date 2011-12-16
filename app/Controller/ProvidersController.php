<?php
class ProvidersController extends AppController {
	
	public $uses = array('Region','Provider','ProviderType');
	
	public function index() {
		
		if ($this->request->is('post')) {
		
			// Add search criteria
			$conditions = array();
			if (isset($this->request->data['field']) && !empty($this->request->data['field'])) {
				$conditions['Provider.last_name LIKE'] =  $this->request->data['field'].'%';
			}
			if (isset($this->request->data['regions']) && !empty($this->request->data['regions'])) {
				$conditions['Provider.region_id'] =  $this->request->data['regions'];
			}
			
			if (!isset($this->request->data['inactive']) && !empty($this->request->data['inactive'])) {
				$conditions['Provider.status'] =  1;
			}
		
			$providers = $this->Provider->find('all', array('conditions' => $conditions,'order'=> array('Provider.first_name ASC','Provider.last_name ASC')));
		} else {
			$providers = $this->Provider->find('all',array('conditions' => array('status' => 1),'order'=>array('Provider.first_name ASC','Provider.last_name ASC')));
		}
		
		
		// Facilities list
		$regions = $this->Region->find('list', array('fields' => array('Region.id', 'Region.name')));
		$services = array();
		
		$this->set(compact('regions','services', 'providers'));
	}
	
	public function edit($id=0) {
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->request->data['Provider']['company_id'] = 1;
			$this->request->data['Provider']['region_id'] = 1;
			$this->request->data['Provider']['payment_method_id'] = 1;
			$this->request->data['Provider']['payment_type_id'] = 1;
			$this->request->data['Provider']['office_id'] = 1;
			
			if ($this->Provider->save($this->request->data)) {
				$this->Session->setFlash("<span>Provider Information has been saved.</span>", 'default', array('class' => 'flash_success'));
				$this->redirect(array('action' => 'index'));
			}
		} else {
			$this->request->data = $this->Provider->read(null, $id);
		}
		
	
		$providerTypes = $this->ProviderType->find('list', array('fields' => array('ProviderType.id', 'ProviderType.name')));
		$status = $this->status;
		
		$this->set(compact('providerTypes','status'));
	}
}
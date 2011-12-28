<?php
class ProviderTypesController extends AppController {
	
	public $uses = array('ServiceType','ProviderType');
	
	public function admin_view() {
		$this->set('ProviderTypes', $this->ProviderType->find('all', array('order'=> array('ProviderType.name'))));
	}
	
	
	public function admin_edit($id=0) {
		if ($this->request->is('post') || $this->request->is('put')) {
			
			// push data to the request object
			$this->request->data['ProviderType']['name'] = $this->request->data['name'];
			$this->request->data['ProviderType']['status'] = $this->request->data['status'];
			$this->request->data['ProviderType']['company_id'] = 1;
			$this->request->data['ProviderType']['service_type_id'] = $this->request->data['servicetypeid'];
			if ($this->ProviderType->save($this->request->data)) {
				$this->Session->setFlash("<span>Provider Type Information has been saved.</span>", 'default', array('class' => 'flash_success'));
				$this->redirect(array('action' => 'view'));
			}
		} else {
			$this->request->data = $this->ProviderType->read(null, $id);
		}
		
		$status = $this->status;
		$serviceTypes = $this->ServiceType->find('list', array('fields' => array('ServiceType.service_type', 'ServiceType.description'),'conditions' => array('ServiceType.status =' => 1)));
		$this->set(compact('status','serviceTypes'));
	}
}
<?php
class ServiceTypesController extends AppController {
	
	public function admin_view() {
		$this->set('serviceTypes', $this->ServiceType->find('all', array('order'=> array('ServiceType.service_type'))));
	}
	
	
	public function admin_edit($id=0) {
		if ($this->request->is('post') || $this->request->is('put')) {
			
			// push data to the request object
			$this->request->data['ServiceType']['service_type'] = $this->request->data['servicetype'];
			$this->request->data['ServiceType']['description'] = $this->request->data['description'];
			$this->request->data['ServiceType']['status'] = $this->request->data['status'];
			if ($this->ServiceType->save($this->request->data)) {
				$this->Session->setFlash("<span>Service Type Information has been saved.</span>", 'default', array('class' => 'flash_success'));
				$this->redirect(array('action' => 'view'));
			}
		} else {
			$this->request->data = $this->ServiceType->read(null, $id);
		}
		
		$status = $this->status;
		$this->set(compact('status'));
	}
}
<?php
class PayrollFrequenciesController extends AppController {
	
	public $uses = array('PayrollFrequency');
	
	public function admin_view() {
		$this->set('payrollFrequencies', $this->PayrollFrequency->find('all', array('order'=> array('PayrollFrequency.name'))));
	}
	
	
	public function admin_edit($id=0) {
		if ($this->request->is('post') || $this->request->is('put')) {
			
			// push data to the request object
			$this->request->data['PayrollFrequency']['name'] = $this->request->data['name'];
			$this->request->data['PayrollFrequency']['status'] = $this->request->data['status'];
			if ($this->PayrollFrequency->save($this->request->data)) {
				$this->Session->setFlash("<span>Payroll Frequency Information has been saved.</span>", 'default', array('class' => 'flash_success'));
				$this->redirect(array('action' => 'view'));
			}
		} else {
			$this->request->data = $this->PayrollFrequency->read(null, $id);
		}
		
		$status = $this->status;
		$this->set(compact('status'));
	}
}
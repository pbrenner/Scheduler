<?php
class PaymentTypesController extends AppController {
	
	public function admin_view() {
		$this->set('paymentTypes', $this->PaymentType->find('all', array('order'=> array('PaymentType.name'))));
	}
	
	
	public function admin_edit($id=0) {
		if ($this->request->is('post') || $this->request->is('put')) {
			
			// push data to the request object
			$this->request->data['PaymentType']['name'] = $this->request->data['name'];
			$this->request->data['PaymentType']['status'] = $this->request->data['status'];
			if ($this->PaymentType->save($this->request->data)) {
				$this->Session->setFlash("<span>Payment Type Information has been saved.</span>", 'default', array('class' => 'flash_success'));
				$this->redirect(array('action' => 'view'));
			}
		} else {
			$this->request->data = $this->PaymentType->read(null, $id);
		}
		
		$status = $this->status;
		$this->set(compact('status'));
	}
}
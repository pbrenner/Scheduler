<?php
class PaymentMethodsController extends AppController {
	
	public function admin_view() {
		$this->set('paymentMethods', $this->PaymentMethod->find('all', array('order'=> array('PaymentMethod.name'))));
	}
	
	
	public function admin_edit($id=0) {
		if ($this->request->is('post') || $this->request->is('put')) {
			
			// push data to the request object
			$this->request->data['PaymentMethod']['name'] = $this->request->data['name'];
			$this->request->data['PaymentMethod']['status'] = $this->request->data['status'];
			if ($this->PaymentMethod->save($this->request->data)) {
				$this->Session->setFlash("<span>Payment Method Information has been saved.</span>", 'default', array('class' => 'flash_success'));
				$this->redirect(array('action' => 'view'));
			}
		} else {
			$this->request->data = $this->PaymentMethod->read(null, $id);
		}
		
		$status = $this->status;
		$this->set(compact('status'));
	}
}
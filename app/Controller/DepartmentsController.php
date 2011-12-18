<?php
class DepartmentsController extends AppController {
	
	public function admin_view() {
		$this->set('departments', $this->Department->find('all', array('order'=> array('Department.department'))));
	}
	
	
	public function admin_edit($id=0) {
		if ($this->request->is('post') || $this->request->is('put')) {
			
			// push data to the request object
			$this->request->data['Department']['department'] = $this->request->data['department'];
			$this->request->data['Department']['status'] = $this->request->data['status'];
			if ($this->Department->save($this->request->data)) {
				$this->Session->setFlash("<span>Department Information has been saved.</span>", 'default', array('class' => 'flash_success'));
				$this->redirect(array('action' => 'view'));
			}
		} else {
			$this->request->data = $this->Department->read(null, $id);
		}
		
		$status = $this->status;
		$this->set(compact('status'));
	}
}
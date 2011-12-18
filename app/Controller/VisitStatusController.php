<?php
class VisitStatusController extends AppController {
	
	public function admin_view() {
		$this->set('visitStatus', $this->VisitStatus->find('all', array('order'=> array('VisitStatus.name'))));
	}
	
	
	public function admin_edit($id=0) {
		if ($this->request->is('post') || $this->request->is('put')) {
			
			// push data to the request object
			$this->request->data['VisitStatus']['name'] = $this->request->data['name'];
			$this->request->data['VisitStatus']['status'] = $this->request->data['status'];
			if ($this->VisitStatus->save($this->request->data)) {
				$this->Session->setFlash("<span>Visit Status Information has been saved.</span>", 'default', array('class' => 'flash_success'));
				$this->redirect(array('action' => 'view'));
			}
		} else {
			$this->request->data = $this->VisitStatus->read(null, $id);
		}
		
		$status = $this->status;
		$this->set(compact('status'));
	}
}
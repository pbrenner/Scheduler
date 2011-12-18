<?php
App::uses('AppController', 'Controller');
/**
 * DxCodeGroups Controller
 *
 * @property DxCodeGroup $DxCodeGroup
 */
class DxCodeGroupsController extends AppController {
	
	public function admin_view() {
		$this->set('dxcodeGroups', $this->DxCodeGroup->find('all', array('order'=> array('DxCodeGroup.name'))));
	}
	
	
	public function admin_edit($id=0) {
		if ($this->request->is('post') || $this->request->is('put')) {
	
			// push data to the request object
			$this->request->data['DxCodeGroup']['name'] = $this->request->data['name'];
			$this->request->data['DxCodeGroup']['status'] = $this->request->data['status'];
			if ($this->DxCodeGroup->save($this->request->data)) {
				$this->Session->setFlash("<span>Dx Code Group Information has been saved.</span>", 'default', array('class' => 'flash_success'));
				$this->redirect(array('action' => 'view'));
			}
		} else {
			$this->request->data = $this->DxCodeGroup->read(null, $id);
		}
	
		$status = $this->status;
		$this->set(compact('status'));
	}


}

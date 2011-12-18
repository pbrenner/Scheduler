<?php
App::uses('AppController', 'Controller');
/**
 * DxCodes Controller
 *
 * @property DxCode $DxCode
 */
class DxCodesController extends AppController {
	
	public function admin_view() {
		$this->set('dxcodes', $this->DxCode->find('all', array('order'=> array('DxCode.code'))));
	}
	
	
	public function admin_edit($id=0) {
		if ($this->request->is('post') || $this->request->is('put')) {
	
			// push data to the request object
			$this->request->data['DxCode']['code'] = $this->request->data['code'];
			$this->request->data['DxCode']['description'] = $this->request->data['description'];
			$this->request->data['DxCode']['classification_id'] = $this->request->data['classificationid'];
			$this->request->data['DxCode']['rank'] = $this->request->data['rank'];
			$this->request->data['DxCode']['company_id'] = 1;
			$this->request->data['DxCode']['active'] = $this->request->data['active'];
			if ($this->DxCodeGroup->save($this->request->data)) {
				$this->Session->setFlash("<span>Dx Code Information has been saved.</span>", 'default', array('class' => 'flash_success'));
				$this->redirect(array('action' => 'view'));
			}
		} else {
			$this->request->data = $this->DxCode->read(null, $id);
		}
	
		$status = $this->status;
		$this->set(compact('status'));
	}


}

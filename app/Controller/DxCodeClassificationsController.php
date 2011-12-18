<?php
App::uses('AppController', 'Controller');
/**
 * DxCodeClassifications Controller
 *
 * @property DxCodeClassification $DxCodeClassification
 */
class DxCodeClassificationsController extends AppController {

	public function admin_view() {
		$this->set('dxcodeClassifications', $this->DxCodeClassification->find('all', array('order'=> array('DxCodeClassification.classification'))));
	}
	
	
	public function admin_edit($id=0) {
		if ($this->request->is('post') || $this->request->is('put')) {
				
			// push data to the request object
			$this->request->data['DxCodeClassification']['classification'] = $this->request->data['classification'];
			$this->request->data['DxCodeClassification']['status'] = $this->request->data['status'];
			if ($this->DxCodeClassification->save($this->request->data)) {
				$this->Session->setFlash("<span>Dx Code Classification Information has been saved.</span>", 'default', array('class' => 'flash_success'));
				$this->redirect(array('action' => 'view'));
			}
		} else {
			$this->request->data = $this->DxCodeClassification->read(null, $id);
		}
	
		$status = $this->status;
		$this->set(compact('status'));
	}
}

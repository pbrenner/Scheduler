<?php
class AppController extends Controller {

	public $ext = '.html';
	public $layout = "bcs";
	
	public $helpers = array(
			'Html',
			'Form',
			'Session',
			'Security');
	
	public $components = array(
			'Session',
			'Auth' => array(
					'loginRedirect' => array('controller' => 'Patients', 'action' => 'index'),
					'logoutRedirect' => array('controller' => 'Users', 'action' => 'login')
			)
	);
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view');
	}
}
	
?>
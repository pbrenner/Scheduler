<?php
class AppController extends Controller {

	public $ext = '.html';
	public $layout = "bcs";
	
	public $helpers = array(
			'Html',
			'Form',
			'Session',
			'Security',
			'Time');
	
	public $components = array(
			'Session',
			'Auth' => array(
					'loginRedirect' => array('controller' => 'Patients', 'action' => 'index'),
					'logoutRedirect' => array('controller' => 'Users', 'action' => 'login')
			)
	);
	
	public $status = array(1=>'Active', 0 => 'Inactive');
	public $gender = array('M'=> 'Male', 'F' => 'Female');
}
	
?>
<?php
class UsersController extends AppController {
	
	public $uses = array('UserRole', 'User');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add', 'logout');
	}
	
	public function login() {
		if ($this->Auth->login ()) {
			$userRoles = $this->UserRole->find ( 'all', array ('conditions' => 'UserRole.user_id = ' . $this->Auth->user ( 'id' ) ) );
			$roles = array ();
			foreach ( $userRoles as $userRole ) :
				$roles [] = $userRole ['Role'];
			endforeach;
			$this->Session->write ( 'Roles', $roles );
			$this->redirect ( $this->Auth->redirect () );
		} else {
			if ($this->request->is ( 'post' )) {
				$this->Session->setFlash ( "<span>Invalid username or password, try again</span>", 'default', array ('class' => 'flash_error' ) );
			}
		}
	}
	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
	
	public function edit() {
		if ($this->request->is('post') || $this->request->is('put')) {
			
			$this->request->data['User']['first_name'] = $this->request->data['firstName'];
			$this->request->data['User']['last_name'] = $this->request->data['lastName'];
			$this->request->data['User']['username'] = $this->request->data['username'];
			$this->request->data['User']['email'] = $this->request->data['email'];
			
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash("<span>Profile Information has been saved.</span>", 'default', array('class' => 'flash_success'));
				$this->redirect(array('controller'=>'Patients', 'action' => 'index'));
			}
		} else {
			$this->request->data = $this->User->read(null, $this->Auth->user('id'));
			
		}
		
	}
}
	
?>
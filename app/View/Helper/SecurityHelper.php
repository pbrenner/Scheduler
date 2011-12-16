<?php
/* /app/View/Helper/LinkHelper.php */
App::uses('AppHelper', 'View/Helper');

class SecurityHelper extends AppHelper {
	
	var $helpers = array('Session');
	
    function hasRole($role) {
    	$userRoles = SessionComponent::read('Roles');
        
        foreach($userRoles as $userRole):
        	if (strcasecmp($userRole['role'], $role) == 0) {
        		return TRUE;
        	}
        endforeach;
        return FALSE;
    }
    
    function isLoggedIn() {
    	return $this->Session->check('Auth.User.id');
    }
}
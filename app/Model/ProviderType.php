<?php
App::uses('AppModel', 'Model'); 
class ProviderType extends AppModel {
	
	public $name = 'ProviderType';
	
	public $belongsTo = array(
			'Created' => array(
					'className'    => 'User',
					'foreignKey'   => 'created_by'
			),
			'Modified' => array(
					'className'    => 'User',
					'foreignKey'   => 'modified_by'
			),
			'ServiceType' => array(
					'className'	=>'ServiceType')
			
	);
}
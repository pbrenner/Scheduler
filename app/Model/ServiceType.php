<?php
App::uses('AppModel', 'Model'); 
class ServiceType extends AppModel {
	
	public $name = 'ServiceType';
	public $primaryKey = 'service_type';
	
	public $belongsTo = array(
			'Created' => array(
					'className'    => 'User',
					'foreignKey'   => 'created_by'
			),
			'Modified' => array(
					'className'    => 'User',
					'foreignKey'   => 'modified_by'
			)
	);
}
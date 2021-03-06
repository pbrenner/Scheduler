<?php
App::uses('AppModel', 'Model'); 
class VisitStatus extends AppModel {
	
	public $name = 'VisitStatus';
	public $useTable = 'visit_status';
	
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
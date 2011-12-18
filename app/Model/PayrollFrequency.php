<?php
App::uses('AppModel', 'Model'); 
class PayrollFrequency extends AppModel {
	
	public $name = 'PayrollFrequency';
	public $useTable = 'payroll_frequencies';
	
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
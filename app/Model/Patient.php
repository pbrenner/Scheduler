<?php
App::uses('AppModel', 'Model');
class Patient extends AppModel {
	
	public $name = 'Patient';
	
	public $belongsTo = array(
			'Company' => array(
					'className' => 'Company',
					'foreignKey' => 'company_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			),
			'Facility' => array(
					'className' => 'Facility',
					'foreignKey' => 'facility_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);
}
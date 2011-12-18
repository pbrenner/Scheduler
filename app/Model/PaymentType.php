<?php
App::uses('AppModel', 'Model'); 
class PaymentType extends AppModel {
	
	public $name = 'PaymentType';
	
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
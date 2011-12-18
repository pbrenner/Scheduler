<?php
App::uses('AppModel', 'Model');
/**
 * DxCodeClassification Model
 *
 */
class DxCodeClassification extends AppModel {
	
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

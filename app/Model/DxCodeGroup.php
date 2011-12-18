<?php
App::uses('AppModel', 'Model');
/**
 * DxCodeGroup Model
 *
 */
class DxCodeGroup extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	
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

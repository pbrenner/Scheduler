<?php
App::uses('AppModel', 'Model');
/**
 * DxGroupAssignment Model
 *
 * @property DxCodes $DxCodes
 * @property DxCodeGroups $DxCodeGroups
 */
class DxGroupAssignment extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'DxCodes' => array(
			'className' => 'DxCodes',
			'foreignKey' => 'dx_codes_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DxCodeGroups' => array(
			'className' => 'DxCodeGroups',
			'foreignKey' => 'dx_code_groups_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

<?php
App::uses('AppModel', 'Model');
/**
 * ProcCode Model
 *
 * @property Company $Company
 * @property CodeGroup $CodeGroup
 */
class ProcCode extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Company' => array(
			'className' => 'Company',
			'foreignKey' => 'company_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CodeGroup' => array(
			'className' => 'CodeGroup',
			'foreignKey' => 'code_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

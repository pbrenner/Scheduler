<?php
App::uses('AppModel', 'Model');
/**
 * Visit Model
 *
 * @property Company $Company
 * @property Patient $Patient
 * @property Provider $Provider
 * @property Facility $Facility
 * @property VisitStatus $VisitStatus
 * @property PayrollOverrideCodes $PayrollOverrideCodes
 * @property AppliedDx $AppliedDx
 * @property HasAttachment $HasAttachment
 */
class Visit extends AppModel {

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
		'Patient' => array(
			'className' => 'Patient',
			'foreignKey' => 'patient_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Provider' => array(
			'className' => 'Provider',
			'foreignKey' => 'provider_id',
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
		),
		'VisitStatus' => array(
			'className' => 'VisitStatus',
			'foreignKey' => 'visit_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PayrollOverrideCodes' => array(
			'className' => 'PayrollOverrideCodes',
			'foreignKey' => 'payroll_override_codes_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'AppliedDx' => array(
			'className' => 'AppliedDx',
			'foreignKey' => 'visit_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'HasAttachment' => array(
			'className' => 'HasAttachment',
			'joinTable' => 'visits_has_attachments',
			'foreignKey' => 'visit_id',
			'associationForeignKey' => 'has_attachment_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}

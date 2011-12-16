<?php
App::uses('AppModel', 'Model');
/**
 * Facility Model
 *
 * @property Company $Company
 * @property Region $Region
 * @property FacilityType $FacilityType
 * @property Patient $Patient
 * @property Visit $Visit
 */
class Facility extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Facility Name required',
			),
		),
		'abbreviation' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Abbreviation is required',
				),
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'Abbreviation must be Alphanumeric',
			),
		),
		'address_line1' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Address Line 1 required',
			),
		),
		'city' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'City is required',
			),
		),
		'state' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'State is required',
			),
		),
		'postal_code' => array(
			'postal' => array(
				'rule' => array('postal', null, 'us'),
				'message' => 'Please enter a valid zip code',
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Zip code is required',
			),
		),
		'beds' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Please enter the number of beds',
			),
		),
		'phone' => array(
				'phoneno' => array(
						'rule' => array('phone'),
						'message' => 'Please enter a valid phone number',
				),
		),
		'fax' => array(
				'faxno' => array(
						'rule' => array('phone'),
						'message' => 'Please enter a valid fax number',
				),
		),
	);

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
		'Region' => array(
			'className' => 'Region',
			'foreignKey' => 'region_id',
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
		'Patient' => array(
			'className' => 'Patient',
			'foreignKey' => 'facility_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Visit' => array(
			'className' => 'Visit',
			'foreignKey' => 'facility_id',
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

}

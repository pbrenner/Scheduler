<?php
App::uses('AppModel', 'Model');
/**
 * Provider Model
 *
 * @property Company $Company
 * @property ProviderType $ProviderType
 * @property PaymentMethod $PaymentMethod
 * @property PaymentType $PaymentType
 * @property EtoTotal $EtoTotal
 * @property PayrollExtra $PayrollExtra
 * @property Visit $Visit
 * @property ProviderRegions $ProviderRegions
 */
class Provider extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

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
		'ProviderType' => array(
			'className' => 'ProviderType',
			'foreignKey' => 'provider_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PaymentMethod' => array(
			'className' => 'PaymentMethod',
			'foreignKey' => 'payment_method_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PaymentType' => array(
			'className' => 'PaymentType',
			'foreignKey' => 'payment_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Created' => array(
					'className'    => 'User',
					'foreignKey'   => 'created_by'
		),
		'Modified' => array(
					'className'    => 'User',
					'foreignKey'   => 'modified_by'
		)
	);
	
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'EtoTotal' => array(
			'className' => 'EtoTotal',
			'foreignKey' => 'provider_id',
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
		'PayrollExtra' => array(
			'className' => 'PayrollExtra',
			'foreignKey' => 'provider_id',
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
			'foreignKey' => 'provider_id',
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
		'Region' => array(
			'className' => 'Region',
			'joinTable' => 'provider_regions',
			'foreignKey' => 'provider_id',
			'associationForeignKey' => 'region_id',
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

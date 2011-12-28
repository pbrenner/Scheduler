<?php
App::uses('AppModel', 'Model');
/**
 * ProviderRegion Model
 *
 * @property Providers $Providers
 * @property Regions $Regions
 */
class ProviderRegion extends AppModel {

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Providers' => array(
			'className' => 'Providers',
			'foreignKey' => 'providers_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Regions' => array(
			'className' => 'Regions',
			'foreignKey' => 'regions_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}

<?php
App::uses('AppModel', 'Model');
class Region extends AppModel {
	
	public $name = 'Region';
	
	public $hasMany = array('Facility');
}
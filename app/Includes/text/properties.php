<?php
	use App\Models\DogAdmin\Utils;

	$properties['name'] = (empty($field->name)) ? Utils::decamelize($field->title) : $field->name;
	$properties['disabled'] = (empty($field->disabled) || $field->disabled == false) ? '' : 'disabled';
	$properties['nullable'] = (empty($field->nullable)) ? '' : ':nullable';
	$properties['isNullable'] = (empty($field->nullable)) ? '0' : '1';
?>
<?php
	use App\Models\DogAdmin\Utils;

	$properties['name'] = (empty($field->name)) ? Utils::decamelize($field->title) : $field->name;
	$properties['disabled'] = (empty($field->disabled) || $field->disabled == false) ? '' : 'disabled';
	$properties['hasPrefix'] = (empty($field->prefix)) ? '0' : '1';
?>
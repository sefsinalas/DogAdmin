<?php
	use App\Models\DogAdmin\Utils;

	$properties['name'] = (empty($field->name)) ? Utils::decamelize($field->title) : $field->name;
?>
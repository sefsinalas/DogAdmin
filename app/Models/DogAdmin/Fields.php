<?php

namespace App\Models\DogAdmin;

use App\Models\DogAdmin\Utils;
use App\Models\DogAdmin\Stubs;

class Fields{

	/**
	 * Devuelve el html correspondiente para el campo que irá dentro del form
	 * @param  object $field  Datos del campo
	 * @param  object $config Datos del proyecto
	 * @return string         HTML del campo
	 */
	public static function inForm($field, $config)
	{
		$content = Stubs::get("fields/$field->type/form.stub");

		if (empty($content))
		{
			return '';
		}

		$properties = get_object_vars($field);

		include(app_path('Includes/'.$field->type.'.php'));

		return Stubs::replace($content, $properties);
	}

	/**
	 * Devuelve el html correspondiente para la cabecera de la tabla
	 * @param  object $field  Datos del campo
	 * @param  object $config Datos del proyecto
	 * @return string         HTML del campo
	 */
	public static function tableTitle($field, $config)
	{
		switch ($field->type)
		{
			// agregar aqui cabeceras de tablas para campos especiales
			// code

			// y para todo el resto
			default:
				$content = '<th>'.$field->title.'</th>'.PHP_EOL;
				break;
		}

		return $content;
	}


	/**
	 * Devuelve el html correspondiente para el contenido de la tabla
	 * @param  object $field  Datos del campo
	 * @param  object $config Datos del proyecto
	 * @return string         HTML del campo
	 */
	public static function tableContent($field, $config)
	{
		$content = Stubs::get("fields/$field->type/listing.stub");

		if (empty($content))
		{
			return '';
		}

		$properties = get_object_vars($field);

		include(app_path('Includes/'.$field->type.'.php'));

    	return Stubs::replace($content, $properties);
	}


	/**
	 * Devuelve el HTML correspondiente a como se visualizara el campo en la vista SHOW
	 * @param  object $field  Datos del campo
	 * @param  object $config Datos del proyecto
	 * @return string HTML del campo
	 */
	public static function show($field, $config)
	{
		$content = Stubs::get("fields/$field->type/show.stub");

		if (empty($content))
		{
			return '';
		}

		$properties = get_object_vars($field);

		include(app_path('Includes/'.$field->type.'.php'));

    	return Stubs::replace($content, $properties);
	}

	/**
	 * Devuelve el nombre del campo en la BD
	 * @param  object $field campo en forma de objeto
	 * @return string        nombre del campo en la base de datos
	 */
	public static function getDbName($field)
	{
		switch ($field->type)
		{
			case 'value':
				# code...
				break;

			default:
				$name = (empty($field->name)) ? Utils::decamelize($field->title) : $field->name;
				break;
		}

		return $name;
	}
}
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
		/*==============================
		=            STRING            =
		==============================*/
		if ($field->type == 'string')
		{
			// obtengo el template
			$fieldTemplate = Stubs::get('fields/'.$field->type.'.stub');

			if (empty($fieldTemplate))
			{
				return '';
			}

			/*========================================
			=            REEMPLAZO CAMPOS            =
			========================================*/

			$fieldTemplate = str_replace('{{title}}', $field->title, $fieldTemplate);

    		$fieldName = (empty($field->name)) ? Utils::decamelize($field->title) : $field->name;

    		$fieldTemplate = str_replace('{{name}}', $fieldName, $fieldTemplate);

			/*=====  End of REEMPLAZO CAMPOS  ======*/

			// devuelvo campos
    		return $fieldTemplate.PHP_EOL.PHP_EOL;
		}

		/*============================
		=            TEXT            =
		============================*/
		if ($field->type == 'text')
		{
			// obtengo el template
			$fieldTemplate = Stubs::get('fields/'.$field->type.'.stub');

			if (empty($fieldTemplate))
			{
				return '';
			}

			/*========================================
			=            REEMPLAZO CAMPOS            =
			========================================*/

			$fieldTemplate = str_replace('{{title}}', $field->title, $fieldTemplate);

    		$fieldName = (empty($field->name)) ? Utils::decamelize($field->title) : $field->name;

    		$fieldTemplate = str_replace('{{name}}', $fieldName, $fieldTemplate);

			/*=====  End of REEMPLAZO CAMPOS  ======*/

			// devuelvo campos
    		return $fieldTemplate.PHP_EOL.PHP_EOL;
		}
	}

	/**
	 * Devuelve el html correspondiente para la cabecera de la tabla
	 * @param  object $field  Datos del campo
	 * @param  object $config Datos del proyecto
	 * @return string         HTML del campo
	 */
	public static function tableTitle($field, $config)
	{
		/*==============================
		=            STRING            =
		==============================*/
		if ($field->type == 'string')
		{
			return '<th>'.$field->title.'</th>'.PHP_EOL;
		}

		/*============================
		=            TEXT            =
		============================*/
		if ($field->type == 'text')
		{
			return '<th>'.$field->title.'</th>'.PHP_EOL;
		}
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

		/*==============================
		=            STRING            =
		==============================*/
	   	if ($field->type == 'string')
    	{
    		$properties['name'] = (empty($field->name)) ? Utils::decamelize($field->title) : $field->name;

    		return Stubs::replace($content, $properties);
    	}

    	/*============================
		=            TEXT            =
		============================*/
	   	if ($field->type == 'text')
    	{
    		$properties['name'] = (empty($field->name)) ? Utils::decamelize($field->title) : $field->name;

    		return Stubs::replace($content, $properties);
    	}
	}


	/**
	 * Devuelve el HTML correspondiente a como se visualizara el campo en la vista SHOW
	 * @param  object $field  Datos del campo
	 * @param  object $config Datos del proyecto
	 * @return string HTML del campo
	 */
	public static function show($field, $config)
	{
		/*==============================
		=            STRING            =
		==============================*/
		if ($field->type == 'string')
    	{
    		$name = (empty($field->name)) ? Utils::decamelize($field->title) : $field->name;
    		return '<td><strong><small>'.$field->title.'</small></strong><br>{{ $item->'.$name.' }}</td>'.PHP_EOL;
    	}

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
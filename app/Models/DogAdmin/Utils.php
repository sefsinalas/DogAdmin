<?php

namespace App\Models\DogAdmin;

class Utils{

	/**
	 * Cambia el nombre de una variable en el .env
	 * @param  string $var   La variable que deseamos cambiar
	 * @param  string $value El valor que deseamos poner
	 */
	public static function changeEnv($var, $value)
	{
		file_put_contents(base_path().'/.env', str_replace(
		    $var.'='.env($var),
		    $var.'='.$value,
		    file_get_contents(base_path().'/.env')
		));
	}

	/**
	 * Cambia una string de tipo camelCase a palabra_con_guion_bajo
	 * @param  string $camel camelCase
	 * @return string        palabra_con_guion_bajo
	 */
	public static function decamelize($camel)
	{
		return str_replace(' ', '_', strtolower(preg_replace(['/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/'], '$1_$2', $camel)));
	}

	/**
	 * Cambia un string_con_guion_bajo a camelCase
	 * @param  string $uncamel string_con_guion_bajo
	 * @return string          camelCase
	 */
	public static function camelize($uncamel)
	{
		return str_replace(' ', '', ucwords(str_replace('-', ' ', $uncamel)));
	}
}
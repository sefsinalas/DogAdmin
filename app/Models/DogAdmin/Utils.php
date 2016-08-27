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
}
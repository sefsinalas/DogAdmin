<?php
namespace App\Models\DogAdmin;

use File;
use Log;

class Stubs{

	/**
	 * Devuelve el contenido de un stub
	 * @param  string $file path sin tener en cuenta resources/stubs
	 * @return string       contenido del stub
	 */
	public static function get($path)
	{
		$file = File::glob('resources/stubs/'.$path);

		if (!empty($file))
		{
			return File::get($file[0]);
		}

		return false;
	}


	public static function replace($content, $properties)
	{
		foreach ($properties as $key => $value)
		{
			$content = str_replace('{{'.$key.'}}', $value, $content);
		}

		return $content.PHP_EOL;
	}
}
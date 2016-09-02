<?php

namespace App\Models\DogAdmin;

use File;

class Config{

	// datos del archivo config.json
	protected $data;

	/**
	 * Setea la configuracion
	 */
	public function __construct()
	{
		$json = File::get("config/config.json");
        $this->data = json_decode($json);
	}

	/**
	 * Datos del archivo config.json
	 * @return object config.json
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * Datos del menu desde config.json
	 * @return object menu
	 */
	public function getMenusData()
	{
		return $this->data->menus;
	}

	/**
	 * Devuelve los datos de un modulo basados en el nombre de la tabla del modulo
	 * @param  string $table tabla
	 * @return object        modulo
	 */
	public function getModuleData($table)
	{
		foreach ($this->data->modules as $module)
		{
			if ($module->general->table == $table)
			{
				return $module;
			}
		}

		return false;
	}
}
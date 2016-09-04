<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use App\Models\DogAdmin\Utils;
use App\Models\DogAdmin\Config;
use App\Models\DogAdmin\Fields;

use App\User;

use Log;

class CreateSeedersDogAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dogadmin:create_seeders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea los seeders';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $content = File::get("resources/stubs/seeder.stub");
        $config = new Config();
        $modules = $config->getModulesData();

        $models = [];

        /*========================================
        =            CREO LOS SEEDERS            =
        ========================================*/
        $seeders = '';

        foreach ($modules as $module)
        {
        	$seeders .= Utils::camelize($module->general->table).'::insert(['.PHP_EOL;

        	foreach ($module->fields as $field)
        	{
        		if (!empty($field->fake))
        		{
        			$name = Fields::getDbName($field);
        			$seeders .= "'$name' => ".'$faker->'.$field->fake.','.PHP_EOL;

        			$models[] = $module->general->table;
        		}
        	}

        	$seeders .= ']);'.PHP_EOL;
        }

        $content = str_replace('{{seeders}}', $seeders, $content);
        /*=====  End of CREO LOS SEEDERS  ======*/

        /*========================================
        =            CREO LOS MODELOS            =
        ========================================*/
        $models = array_unique($models);
        $models = array_values($models);

        for ($i=0; $i < count($models); $i++)
        {
        	$models[$i] = 'use App\Models\\'.Utils::camelize($models[$i]).';'.PHP_EOL;
        }

        Log::info($models);

        $content = str_replace('{{models}}', implode('', $models), $content);
        /*=====  End of CREO LOS MODELOS  ======*/



        File::put("database/seeds/DatabaseSeeder.php", $content);
    }
}


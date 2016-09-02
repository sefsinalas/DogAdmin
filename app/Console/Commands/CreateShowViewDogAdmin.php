<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use App\Models\DogAdmin\Utils;
use App\Models\DogAdmin\Fields;
use App\Models\DogAdmin\Config;

use App\User;

class CreateShowViewDogAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dogadmin:create_show_view {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea una vista para mostrar un registro';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $content = File::get("resources/stubs/view.show.stub");

        $config = new Config;
        $data = $config->getData();

        $module = $config->getModuleData($this->argument('name'));

        /*==============================
        =            TITTLE            =
        ==============================*/
        $content = str_replace('{{title}}', $module->general->name, $content);
        $content = str_replace('{{table}}', $module->general->table, $content);
        /*=====  End of TITTLE  ======*/

        /*==============================
        =            FIELDS            =
        ===============================*/

    	$camel = Utils::camelize($module->general->table);
    	$fields = '';

    	foreach ($module->fields as $f)
    	{
    		$fields .= '<tr>'.PHP_EOL.Fields::show($f, $data).'</tr>'.PHP_EOL;
    	}

    	$html = str_replace('{{fields}}', $fields, $content);

        /*=============================================
        =            DIRECTORIO Y ARCHIVOS            =
        =============================================*/
        if (!is_dir("resources/views/DogAdmin/"))
        {
		  	mkdir("resources/views/DogAdmin");
		}

		if (!is_dir("resources/views/DogAdmin/".$camel))
        {
		  	mkdir("resources/views/DogAdmin/".$camel);
		}

        File::put("resources/views/DogAdmin/".$camel.'/show.blade.php', $html);
        /*=====  End of DIRECTORIO Y ARCHIVOS  ======*/


        /*=====  End of FIELDS  ======*/

    }
}

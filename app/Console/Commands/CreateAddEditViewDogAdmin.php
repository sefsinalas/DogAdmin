<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use App\Models\DogAdmin\Utils;
use App\Models\DogAdmin\Fields;
use App\Models\DogAdmin\Config;

use App\User;

class CreateAddEditViewDogAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dogadmin:create_add_edit_view {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea una vista para agregar/editar';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $content = File::get("resources/stubs/view.add_edit.stub");

        $config = new Config;
        $data = $config->getData();

        /*==============================================================
        =            BUSCO EL MODULO PARA OBTENER SUS DATOS            =
        ==============================================================*/
        $module = $config->getModuleData($this->argument('name'));

        $moduleCamel = Utils::camelize($module->general->table);
        /*=====  End of BUSCO EL MODULO PARA OBTENER SUS DATOS  ======*/


        /*==============================
        =            COMMON            =
        ==============================*/
        $content = str_replace('{{title}}', $module->general->name, $content);
        $content = str_replace('{{table}}', $module->general->table, $content);
        /*=====  End of COMMON  ======*/


        /*==============================
        =            FIELDS            =
        ===============================*/
        $fields = '';

        foreach ($module->fields as $f)
        {
        	$fields .= Fields::inForm($f, $data);
        }

        $content = str_replace('{{fields}}', $fields, $content);
        /*=====  End of FIELDS  ======*/



        /*=============================================
        =            DIRECTORIO Y ARCHIVOS            =
        =============================================*/
        if (!is_dir("resources/views/DogAdmin/"))
        {
		  	mkdir("resources/views/DogAdmin");
		}

		if (!is_dir("resources/views/DogAdmin/".$moduleCamel))
        {
		  	mkdir("resources/views/DogAdmin/".$moduleCamel);
		}

        File::put("resources/views/DogAdmin/".$moduleCamel.'/add_edit.blade.php', $content);
        /*=====  End of DIRECTORIO Y ARCHIVOS  ======*/



    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use App\Models\DogAdmin\Utils;
use App\Models\DogAdmin\Fields;
use App\Models\DogAdmin\Config;

use App\User;

class CreateIndexViewDogAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dogadmin:create_index_view {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea una vista de index';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $content = File::get("resources/stubs/view.index.stub");

        $config =  new Config;
        $data = $config->getData();

        /*==============================================================
        =            BUSCO EL MODULO PARA OBTENER SUS DATOS            =
        ==============================================================*/
        $module = $config->getModuleData($this->argument('name'));

        $moduleCamel = Utils::camelize($module->general->table);
        /*=====  End of BUSCO EL MODULO PARA OBTENER SUS DATOS  ======*/


        /*==============================
        =            TITTLE            =
        ==============================*/
        $content = str_replace('{{title}}', $module->general->name, $content);
        /*=====  End of TITTLE  ======*/


        /*====================================
        =            COLUMN TITLES            =
        ====================================*/
        $columnTitles = '<th>ID</th>'	.PHP_EOL;

        foreach ($module->fields as $f)
        {
        	$columnTitles .= Fields::tableTitle($f, $data);
        }

        $content = str_replace('{{column-titles}}', $columnTitles, $content);
        /*=====  End of COLUMN TITLES  ======*/


        /*======================================
        =            COLUMN CONTENT            =
        ======================================*/
        $columns = '<tr>'.PHP_EOL.'<td>{{ $item->id }}</td>'.PHP_EOL;

        foreach ($module->fields as $f)
        {
        	$columns .= Fields::tableContent($f, $data);
        }

        $columns .= '<td>';
        $columns .= '<a href="home/{{ $item->id }}"><i class="fa fa-fw fa-eye fa-lg text-primary"></i></a>';
        $columns .= '<a href="home/edit/{{ $item->id }}"><i class="fa fa-fw fa-edit fa-lg text-success"></i></a>';
       	$columns .= '<a href="home/destroy/{{ $item->id }}"><i class="fa fa-fw fa-trash fa-lg text-danger" onclick="return confirm("Estas seguro?")"></i></a>';
       	$columns .= '</td>'.PHP_EOL.'</tr>'.PHP_EOL;

        $content = str_replace('{{columns}}', $columns, $content);
        /*=====  End of COLUMN CONTENT  ======*/


        /*===============================
        =            BUTTONS            =
        ===============================*/
        $content = str_replace('{{table}}', $module->general->table, $content);
        /*=====  End of BUTTONS  ======*/




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

        File::put("resources/views/DogAdmin/".$moduleCamel.'/index.blade.php', $content);
        /*=====  End of DIRECTORIO Y ARCHIVOS  ======*/



    }
}

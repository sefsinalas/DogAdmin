<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use App\Models\DogAdmin\Utils;

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

        $json = File::get("config/config.json");
        $data = json_decode($json);

        /*==============================================================
        =            BUSCO EL MODULO PARA OBTENER SUS DATOS            =
        ==============================================================*/
        foreach ($data->modules as $m)
        {
        	if ($m->general->table == $this->argument('name'))
        	{
        		$module = $m;
        	}
        }

        $camel = Utils::camelize($module->general->table);
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
        	if ($f->type == 'string')
        	{
        		$columnTitles .= '<th>'.$f->title.'</th>'.PHP_EOL;
        	}
        }

        $columnTitles .= '<th>Acciones</th>'.PHP_EOL;

        $content = str_replace('{{column-titles}}', $columnTitles, $content);
        /*=====  End of COLUMN TITLES  ======*/


        /*======================================
        =            COLUMN CONTENT            =
        ======================================*/
        $columns = '<td>{{ $item->id }}</td>'.PHP_EOL;

        foreach ($module->fields as $f)
        {
        	$name = (empty($f->name)) ? Utils::decamelize($f->title) : $f->name;

        	if ($f->type == 'string')
        	{
        		$columns .= '<td>{{ $item->'.$name.' }}</td>'.PHP_EOL;
        	}

        }

        $columns .= '<td></td>'.PHP_EOL;

        $content = str_replace('{{columns}}', $columns, $content);
        /*=====  End of COLUMN CONTENT  ======*/



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

        File::put("resources/views/DogAdmin/".$camel.'/index.blade.php', $content);
        /*=====  End of DIRECTORIO Y ARCHIVOS  ======*/



    }
}

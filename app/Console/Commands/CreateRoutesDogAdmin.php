<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use App\Models\DogAdmin\Utils;
use App\Models\DogAdmin\Fields;
use App\Models\DogAdmin\Config;

use App\User;

class CreateRoutesDogAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dogadmin:create_route {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea las rutas para un modulo';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    	$content = File::get('app/Http/routes.php');
        $newContent = File::get("resources/stubs/routes.stub");

        $config = new Config;
        $data = $config->getData();

        $module = $config->getModuleData($this->argument('name'));

        /*==============================
        =            TITTLE            =
        ==============================*/
        $newContent = str_replace('{{model}}', Utils::camelize($module->general->table), $newContent);
        $newContent = str_replace('{{table}}', $module->general->table, $newContent);
        /*=====  End of TITTLE  ======*/

        $content = trim($content).PHP_EOL.PHP_EOL.$newContent;

        File::put("app/Http/routes.php", $content);
        /*=====  End of DIRECTORIO Y ARCHIVOS  ======*/


        /*=====  End of FIELDS  ======*/

    }
}

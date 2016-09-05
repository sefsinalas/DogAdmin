<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use App\Models\DogAdmin\Utils;

use App\User;

class ResetDogAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dogadmin:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resetea (desinstala) el admin';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $json = File::get("config/config.json");
        $data = json_decode($json);


 		/*=============================
 		=            LOGIN            =
 		=============================*/

 		$user = User::where('email', 'demo@demo.com')->delete();

 		/*=====  End of LOGIN  ======*/


 		/*==============================
 		=            FIELDS            =
 		==============================*/

 		// vuelvo atras los cambios en la DB
 		\Artisan::call('migrate:reset');

 		foreach ($data->modules as $m)
 		{
 			// borra las migraciones
 			$file = File::glob('database/migrations/*create_'.$m->general->table.'_table.php');

 			if (!empty($file))
 			{
 				File::delete($file[0]);
 			}


 			// borra los modelos
 			$file = File::glob('app/Models/'.ucfirst($m->general->table).'.php');

 			if (!empty($file))
 			{
 				File::delete($file[0]);
 			}


 			// borra los controllers
 			$file = File::glob('app/Http/Controllers/DogAdmin/'.ucfirst($m->general->table).'Controller.php');

 			if (!empty($file))
 			{
 				File::delete($file[0]);
 			}

 			// borra las vistas
 			$file = File::glob('resources/views/DogAdmin/'.Utils::camelize($m->general->table));

 			if (!empty($file))
 			{
 				File::delete($file[0].'/index.blade.php');
 				File::delete($file[0].'/add_edit.blade.php');
 				File::delete($file[0].'/show.blade.php');
 				rmdir($file[0]);
 			}
 		}

 		/*=====  End of FIELDS  ======*/

 		/*============================
 		=            MENU            =
 		============================*/
 		// borra el partial de menu
		$file = File::glob('resources/views/partials/sidebar_menu.blade.php');

		if (!empty($file))
		{
			File::delete($file[0]);
		}
 		/*=====  End of MENU  ======*/


 		/*==============================
 		=            ROUTES            =
 		==============================*/
 		$content = File::get('app/Http/routes.php');

 		$content = preg_replace('/\/\/ start[\s\S]+?\/\/ finish/', '', $content);

 		File::put("app/Http/routes.php", $content);
 		/*=====  End of ROUTES  ======*/

    }
}

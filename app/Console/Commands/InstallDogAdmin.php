<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use App\Models\DogAdmin\Utils;
use App\Models\DogAdmin\Config;

use App\User;

class InstallDogAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dogadmin:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Instala el admin';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    	$config = new Config();
        $data = $config->getData();

 		/*================================
 		=            SETEO BD            =
 		================================*/
 		Utils::changeEnv('DB_HOST', $data->general->DB->host);
 		Utils::changeEnv('DB_DATABASE', $data->general->DB->database);
 		Utils::changeEnv('DB_USERNAME', $data->general->DB->username);
 		Utils::changeEnv('DB_PASSWORD', $data->general->DB->password);
 		/*=====  End of SETEO BD  ======*/


 		/*=============================
 		=            LOGIN            =
 		=============================*/
 		\Artisan::call('migrate');

		Utils::changeEnv('REDIRECT_ON_LOGIN', $data->general->redirect_on_login);
		Utils::changeEnv('REDIRECT_AFTER_LOGOUT', $data->general->redirect_after_logout);

		$user = User::where('email', 'demo@demo.com')->first();

		// creo un usuario de prueba si es que no existe
		if ($user == NULL)
		{
			User::create([
				'name'     => 'Usuario de prueba',
				'email'    => 'demo@demo.com',
				'password' => bcrypt('demo123')
	        ]);

	        $this->comment('Usuario de prueba creado');
	        $this->info('Email: demo@demo.com');
	        $this->info('Password: demo123');
		}
 		/*=====  End of LOGIN  ======*/


 		/*==========================================
 		=            OPCIONES GENERALES            =
 		==========================================*/
 		Utils::changeEnv('TITLE', '"'.$data->general->title.'"');
		$mini_title = (!isset($data->general->mini_title)) ? substr($data->general->title, 0, 3) : $data->general->mini_title;
		Utils::changeEnv('MINI_TITLE', '"'.$mini_title.'"');
		Utils::changeEnv('ALLOW_REGISTER', $data->general->allow_register);
		Utils::changeEnv('MAIN_COLOR', $data->general->main_color);
		Utils::changeEnv('LAYOUT', $data->general->layout);
		Utils::changeEnv('FOOTER_LINK', $data->general->footer_link);
		Utils::changeEnv('FOOTER_TITLE', '"'.$data->general->footer_title.'"');
 		/*=====  End of OPCIONES GENERALES  ======*/


 		/*==============================
 		=            MODULES           =
 		==============================*/

 		foreach ($data->modules as $m)
 		{
 			$fieldsForMigration = [];

 			foreach ($m->fields as $f)
 			{
 				$name = (empty($f->name)) ? Utils::decamelize($f->title) : $f->name;

 				/*==============================
 				=            FIELDS            =
 				==============================*/

 				if ($f->type == 'string')
 				{
 					$fieldsForMigration[] = $name.':string(255)';
 				}
 				elseif($f->type == 'text')
 				{
 					$fieldsForMigration[] = $name.':text';
 				}

 				/*=====  End of FIELDS  ======*/

 			}

 			// crea la tabla con sus respectivos campos
 			\Artisan::call('generate:migration', ['name' => 'create_'.$m->general->table.'_table', '--fields' => implode(',', $fieldsForMigration)]);

 			// crea los modelos con table, fillable y rules
 			\Artisan::call('generate:model', ['name' => $m->general->table, '--fields' => implode(',', $fieldsForMigration), '--fillable' => implode(',', $fieldsForMigration), '--table-name' => $m->general->table]);

 			// crea los controladores
 			\Artisan::call('dogadmin:create_controller', ['name' => $m->general->table]);

 			// crea las vistas
 			\Artisan::call('dogadmin:create_index_view', ['name' => $m->general->table]);
 			\Artisan::call('dogadmin:create_add_edit_view', ['name' => $m->general->table]);
 			\Artisan::call('dogadmin:create_show_view', ['name' => $m->general->table]);

 			// creo las rutas
 			\Artisan::call('dogadmin:create_route', ['name' => $m->general->table]);
 		}

 		// crea el menu
 		\Artisan::call('dogadmin:create_sidebar_menu');

 		// crea los seeders
 		\Artisan::call('dogadmin:create_seeders');

 		\Artisan::call('migrate');

 		/*=====  End of MODULES  ======*/

    }
}

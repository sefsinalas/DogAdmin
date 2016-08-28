<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use App\Models\DogAdmin\Utils;

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
        $json = File::get("config/config.json");
        $data = json_decode($json);

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

		Utils::changeEnv('REDIRECT_ON_LOGIN', $data->general->redirect_on_login);
		Utils::changeEnv('REDIRECT_AFTER_LOGOUT', $data->general->redirect_after_logout);

		$user = User::where('email', 'demo@demo.com')->first();

		// creo un usuario de prueba si es que no existe
		if ($user == NULL)
		{
			User::create([
				'name'     => 'Usuario de prueba',
				'email'    => 'demo@demo.com',
				'password' => 'demo123'
	        ]);

	        $this->comment('Usuario de prueba creado');
	        $this->info('Email: demo@demo.com');
	        $this->info('Password: demo123');
		}

 		/*=====  End of LOGIN  ======*/

 		/*==============================
 		=            TABLES            =
 		==============================*/

 		foreach ($data->modules as $m)
 		{
 			// creo la migracion que solo crea las tablas
 			\Artisan::call('make:migration', ['name' => 'create_'.$m->general->table.'_table', '--create' => $m->general->table]);
 		}

 		\Artisan::call('migrate');


 		/*=====  End of TABLES  ======*/


 		/*==============================
 		=            FIELDS            =
 		==============================*/

 		foreach ($data->modules as $m)
 		{
 			$fields = [];

 			foreach ($m->fields as $f)
 			{
 				$name = (empty($f->name)) ? preg_replace('/[^\w-]/', '', strtolower($f->title)) : $f->name;

 				if ($f->type == 'string')
 				{
 					$fields[] = $name.':string(255)';
 				}
 				elseif($f->type == 'text')
 				{
 					$fields[] = $name.':text';
 				}
 			}

 			\Artisan::call('generate:migration', ['name' => 'add_fields_to_'.$m->general->table.'_table', '-t' => $m->general->table, '--fields' => implode(',', $fields)]);
 		}

 		\Artisan::call('migrate');

 		/*=====  End of FIELDS  ======*/



    }
}

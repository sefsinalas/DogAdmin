<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use App\Models\DogAdmin\Utils;

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


    }
}

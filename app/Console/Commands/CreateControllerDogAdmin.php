<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use App\Models\DogAdmin\Utils;

use App\User;

class CreateControllerDogAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dogadmin:create_controller {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un controller';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $content = File::get("resources/stubs/controller.stub");

        $camel = Utils::camelize($this->argument('name'));

        $models = 'use App\Models\\'.$camel.';'.PHP_EOL;
        $MainModel = $camel;

        $content = str_replace('{{models}}', $models, $content);
        $content = str_replace('{{class}}', $camel.'Controller', $content);
        $content = str_replace('{{model}}', $MainModel, $content);
        $content = str_replace('{{view}}', $camel, $content);
        $content = str_replace('{{table}}', $this->argument('name'), $content);
        $content = str_replace('{{collection}}', $this->argument('name'), $content);

        File::put("app/Http/Controllers/DogAdmin/".$camel.'Controller.php', $content);
    }
}


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

        $camel = Utils::camelize($this->argument('name'));

        $content = str_replace('{{title}}', $camel, $content);

        if (!is_dir("resources/views/DogAdmin/"))
        {
		  	mkdir("resources/views/DogAdmin");
		}

		if (!is_dir("resources/views/DogAdmin/".$camel))
        {
		  	mkdir("resources/views/DogAdmin/".$camel);
		}

        File::put("resources/views/DogAdmin/".$camel.'/index.blade.php', $content);
    }
}

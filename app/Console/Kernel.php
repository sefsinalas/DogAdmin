<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
    	// DogAdmin: principal
        Commands\InstallDogAdmin::class,
        Commands\ResetDogAdmin::class,
        // DogAdmin: controllers
        Commands\CreateControllerDogAdmin::class,
        // DogAdmin: views
        Commands\CreateIndexViewDogAdmin::class,
        Commands\CreateAddEditViewDogAdmin::class,
        Commands\CreateShowViewDogAdmin::class,
        // DogAdmin: template
        Commands\CreateSidebarMenuDogAdmin::class,
        // Dogadmin: routes
        Commands\CreateRoutesDogAdmin::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }
}

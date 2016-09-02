<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.sidebar', function ($view)
        {
	        $action = app('request')->route()->getAction();

	        $controller = class_basename($action['controller']);

	        list($controller, $action) = explode('@', $controller);

	        list($module) = explode('Controller', $controller);

	        $view->with(compact('controller', 'action', 'module'));
	    });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

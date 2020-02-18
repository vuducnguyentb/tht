<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Helpers\Theme as ViewHelpers;
use View;
use App\Models\Service;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $service = Service::orderBy('created_at', 'desc')->limit(6)->get();
            dd($service);
                $view->with(compact('service'));
        });
    }
}

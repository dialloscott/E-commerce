<?php

namespace App\Providers;

use App\Repositories\DroboxStorage;
use Illuminate\Support\ServiceProvider;

class DroboxStorageProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(DroboxStorage::class,function($app){
           return new DroboxStorage();
        });
    }
}

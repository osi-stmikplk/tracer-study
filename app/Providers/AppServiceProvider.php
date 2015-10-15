<?php

namespace STMIKPLK\Providers;

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
        // register function_helpers yang menjadi pembantu untuk beberapa kebutuhan
        require_once __DIR__ .'/../Tools/function_helpers.php';
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

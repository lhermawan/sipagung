<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Controllers\PegawaiController;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('pegawai',PegawaiController::get_pegawai());
        View::share('link',env('E_HOST'));
        Paginator::useBootstrap();
        
    }
}

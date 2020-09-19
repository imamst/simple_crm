<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Request;

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
        Schema::defaultStringLength(191);

        $menu = '';
        $menu = Request::segment(1);

        $submenu = '';
        $submenu = Request::segment(2);

        view()->share('menu',$menu);
        view()->share('submenu',$submenu);
    }
}

<?php

namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
     * Bootstrap services too all the views.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $view->with('count_cart', Session::get('cart'));
        });   
    }
}

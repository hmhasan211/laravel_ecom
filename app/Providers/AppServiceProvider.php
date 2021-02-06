<?php

namespace App\Providers;

use App\categories;
use Illuminate\Support\ServiceProvider;
use View;

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
        //There are two way to pass data in View file

        // view::share('name','hamid hasan');
        view::composer('front-end.master',function ($view){
            $view->with('categories', categories::where('pub_status',1)->get());
        });
    }
}

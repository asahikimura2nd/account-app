<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Rules\PostcodeCheck;
use App\Rules\TelCheck;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

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
        //運営側
        Validator::extend('tel',[TelCheck::class,'passes']);
        Validator::extend('postcode',[PostcodeCheck::class,'passes']);
        //heroku 
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        
    }
}

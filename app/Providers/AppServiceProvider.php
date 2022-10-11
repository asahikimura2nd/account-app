<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Rules\tel_check;
use App\Rules\postcode_check;
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
        Validator::extend('tel',[tel_check::class,'passes']);
        Validator::extend('postcode',[postcode_check::class,'passes']);
        //お問い合わせ側
        Validator::extend('tel', [App\Rules\TelRule::class,'passes']);
        //heroku 
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        
    }
}

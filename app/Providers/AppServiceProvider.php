<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        /*
        * Para definir que las cadenas de caracteres tendran
          un maximo de 191 en vez de 255 problema de compatibilidad
          con Mysql
        */
        Schema::defaultStringLength(191); 
    }
}

<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\App;
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
      App::bind('ProductRepository', fn() => new ProductRepository());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider{

    public function register()
    {
        $this->app->bind(
            'App\Repositories\ColorsRepositoryInterface',
            'App\Repositories\ColorsRepositoryEloquent'
        );

        $this->app->bind(
            'App\Repositories\UsersRepositoryInterface',
            'App\Repositories\UsersRepositoryEloquent'
        );


        $this->app->bind(
            'App\Repositories\ProductsRepositoryInterface',
            'App\Repositories\ProductsRepositoryEloquent'
        );
    }
}

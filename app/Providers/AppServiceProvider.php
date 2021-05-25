<?php

namespace App\Providers;

use App\Repositories\IUserRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);
    }

    public function boot()
    {
        //
    }
}

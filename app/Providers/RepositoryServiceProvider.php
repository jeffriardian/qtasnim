<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Interfaces\BarangInterface',
            'App\Repositories\BarangRepository'
        );
        $this->app->bind(
            'App\Interfaces\TransaksiInterface',
            'App\Repositories\TransaksiRepository'
        );
    }
}
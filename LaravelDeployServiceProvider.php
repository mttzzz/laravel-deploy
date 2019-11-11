<?php

namespace Mttzzz\LaravelDeploy;

use Illuminate\Support\ServiceProvider;


class LaravelDeployServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config.php' => config_path('deploy.php'),
        ], 'config');

        $this->loadRoutesFrom(__DIR__ . '/Routes/routes.php');

        $this->commands([
            DeployCommand::class
        ]);
    }
}

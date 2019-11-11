<?php

namespace mttzzz\laravelDeploy;

use Illuminate\Support\ServiceProvider;
use mttzzz\laravelDeploy\Console\DeployCommand;

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

<?php

namespace mttzzz\laravelDeploy\Console;

use Illuminate\Console\Command;

class DeployCommand extends Command
{

    protected $signature = 'git:deploy';
    protected $description = 'Deploy from GitHub';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    { 
        //exec('git pull -all');
    }
}

<?php

namespace Mttzzz\LaravelDeploy\Console;


use Illuminate\Console\Command;
use mttzzz\laravelTelegramLog\Telegram;

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
        exec('sudo -u dima git pull 2>&1', $output);
        Telegram::log($output);
    }
}

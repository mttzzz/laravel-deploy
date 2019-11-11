<?php

namespace Mttzzz\LaravelDeploy\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use mttzzz\laravelTelegramLog\Telegram;
use App\Http\Controllers\Controller;

class DeployController extends Controller
{
    public function deploy(Request $request)
    {
        $data = [];
        $data['project'] = $request->repository['name'];
        $data['pusher'] = $request->pusher['name'];
        $data['head_commit'] = $request->head_commit['message'];
        $data['branch'] = $request->ref;
        Telegram::log($data);
        Artisan::call('git:deploy');
        return $data;
    }
}

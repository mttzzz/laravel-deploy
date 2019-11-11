<?php

namespace mttzzz\laravelDeploy\Controllers;

use Illuminate\Http\Request;
use mttzzz\laravelTelegramLog\Telegram;

class DeployController extends Controller
{
    public function deploy(Request $request)
    {
        Telegram::log($request->all());
    }
}

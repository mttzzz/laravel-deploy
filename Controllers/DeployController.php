<?php

namespace Mttzzz\LaravelDeploy\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use mttzzz\LaravelTelegramLog\Telegram;

class DeployController extends Controller
{
    public function deploy(Request $request)
    {
        if ($request->hasHeader('x-hub-signature')) {
            $hubSignature = $request->header('x-hub-signature');
            list($algo, $receivedHash) = explode('=', $hubSignature, 2);
            $correctHash = hash_hmac($algo, $request->getContent(), config('deploy.secret'));
            if (hash_equals($correctHash,$receivedHash)) {
                $data = [];
                $data['project'] = $request->repository['name'];
                $data['commiter'] = $request->head_commit['author']['name'];
                $data['head_commit'] = $request->head_commit['message'];
                $data['branch'] = $request->ref;
                Telegram::log($data);
                Artisan::call('git:deploy');
                Artisan::call('queue:restart');
                return $data;
            } else {
                return ['error' => 'bad secret'];
            }
        } else {
            return ['error' => 'No x-hub-signature'];
        }
    }
}

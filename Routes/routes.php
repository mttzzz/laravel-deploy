<?php
use mttzzz\laravelTelegramLog\Telegram;

Route::post('deploy', function (Request $request) {
    Telegram::log($request->all);
});
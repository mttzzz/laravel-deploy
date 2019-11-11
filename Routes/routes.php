<?php
use mttzzz\laravelTelegramLog\Telegram;

Route::post('api/deploy', function (Request $request) {
    Telegram::log($request->all);
});
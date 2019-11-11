<?php
use mttzzz\laravelTelegramLog\Telegram;

Route::all('deploy', function (Request $request) {
    Telegram::log($request->all);
});
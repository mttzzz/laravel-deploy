<?php
use mttzzz\laravelTelegramLog\Telegram;

Route::any('deploy', function (Request $request) {
    Telegram::log($request->all);
});
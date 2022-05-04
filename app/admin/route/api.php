<?php

use think\facade\Route;

Route::group('user', function () {
    Route::post('login', 'login');
    Route::post('info', 'info')->middleware(\app\middleware\Auth::class);
})->prefix('User/');




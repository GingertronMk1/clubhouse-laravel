<?php

use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', \App\Http\Controllers\IndexController::class)->name('index');
    Route::resources([
        'person' => \App\Http\Controllers\PersonController::class,
    ]);
});

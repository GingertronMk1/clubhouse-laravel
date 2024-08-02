<?php

use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', App\Http\Controllers\IndexController::class)->name('index');
    Route::resources([
        'person' => App\Http\Controllers\PersonController::class,
        'team' => App\Http\Controllers\TeamController::class,
        'sport' => App\Http\Controllers\SportController::class,
        'position' => \App\Http\Controllers\PositionController::class,
    ]);

    if (Illuminate\Support\Facades\App::environment(['local', 'testing'])) {
        Route::get(
            '/dev-services',
            App\Http\Controllers\DevServicesController::class
        )
            ->name('dev-services');
    }
});

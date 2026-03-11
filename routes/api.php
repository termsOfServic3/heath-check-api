<?php

use App\Http\Controllers\HealthCheckController;
use App\Http\Middleware\AddXOwnerHeader;
use App\Http\Middleware\LogRequest;
use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:60,1', LogRequest::class, AddXOwnerHeader::class])
    ->group(function () {
        Route::get('/v1/health-check', HealthCheckController::class);
    });
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix("auth")->group(function (){
    Route::post("login",[\App\Http\Controllers\Auth\LoginController::class,"login"]);
});

Route::middleware('auth:api')->group(function (){
    Route::prefix('admin')->group(function (){
        Route::resource("companies",\App\Http\Controllers\Admin\AdminCompanyController::class);
    });
});

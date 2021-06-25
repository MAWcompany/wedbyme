<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix("auth")->group(function (){
    Route::post("login",[\App\Http\Controllers\Auth\LoginController::class,"login"]);
    Route::get("unauthorized",[\App\Http\Controllers\Auth\LoginController::class,"unauthorized"])
        ->name('unauthorized');
});

Route::middleware('auth:api')->group(function (){
//    Route::post("upload",function (Request $request){
//        if($request->hasFile("image")){
//            $image = \Illuminate\Support\Facades\Storage::disk("images")->put("",$request->file("image"));
//            return response()->json(['status' => true,'response' => $image]);
//        }else{
//            return response()->json(['status' => false,'response' => Null]);
//        }
//    });
    Route::prefix('admin')->middleware('admin')->group(function (){
        Route::get("companies",[\App\Http\Controllers\Admin\AdminCompanyController::class,"index"]);
        Route::post("company",[\App\Http\Controllers\Admin\AdminCompanyController::class,"store"]);
        Route::prefix("company/{company_id}")->group(function (){
            Route::get("/",[\App\Http\Controllers\Admin\AdminCompanyController::class,"show"]);
            Route::put("/",[\App\Http\Controllers\Admin\AdminCompanyController::class,"update"]);
            Route::delete("/",[\App\Http\Controllers\Admin\AdminCompanyController::class,"destroy"]);
            Route::get("halls",[\App\Http\Controllers\Admin\AdminHallController::class,"index"]);
            Route::post("hall",[\App\Http\Controllers\Admin\AdminHallController::class,"store"]);
            Route::prefix("hall/{hall_id}")->group(function (){
                Route::get("/",[\App\Http\Controllers\Admin\AdminHallController::class,"index"]);
                Route::put("/",[\App\Http\Controllers\Admin\AdminHallController::class,"update"]);
                Route::delete("/",[\App\Http\Controllers\Admin\AdminHallController::class,"destroy"]);
            });
        });
    });
});

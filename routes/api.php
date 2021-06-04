<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix("auth")->group(function (){
    Route::post("login",[\App\Http\Controllers\Auth\LoginController::class,"login"]);
    Route::get("unauthorized",[\App\Http\Controllers\Auth\LoginController::class,"unauthorized"])
        ->name('unauthorized');
});

Route::middleware('auth:api')->group(function (){
    Route::post("upload",function (Request $request){
        if($request->hasFile("image")){
            $image = \Illuminate\Support\Facades\Storage::disk("images")->put("",$request->file("image"));
            return response()->json(['status' => true,'response' => $image]);
        }else{
            return response()->json(['status' => false,'response' => Null]);
        }
    });
    Route::prefix('admin')->group(function (){
        Route::resource("companies",\App\Http\Controllers\Admin\AdminCompanyController::class);
    });
});

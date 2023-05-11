<?php

use App\Http\Controllers\API\ApplicationController;
use App\Http\Controllers\API\GroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::middleware("auth")->group(function(){
    
// })
Route::get("/single-group/{group}", [GroupController::class, "single"])->name("single.group");

Route::get("/single-application/{application}", [ApplicationController::class, "single"])->name("application.group");

Route::get("/get-application", [ApplicationController::class, "getData"]);
<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Models\Application;
use App\Models\Group;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get("/daftar-aplikasi", function() {
    $groups = Group::all();
    return view("daftar-aplikasi", compact("groups"));
})->name("daftar-aplikasi");

Route::middleware("guest")->group(function(){
    Route::get("/login", [LoginController::class, "index"])->name("login");

    Route::post("/login/authenticate", [LoginController::class, "authenticate"])->name("login.authenticate");
});

Route::middleware("auth")->group(function(){
    Route::get("/dashboard", function(){
        $total_application = Application::count();
        $total_group = Group::count();
        return view("dashboard.index", compact("total_application", "total_group"));
    })->name("dashboard");

    Route::resources([
        "application" => ApplicationController::class,
        "group" => GroupController::class,
        "profile" => ProfileController::class
    ]);

    Route::get("/logout", [LogoutController::class, "index"])->name("logout");
});
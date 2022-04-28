<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\login;
use App\Http\Controllers\main;
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
    return view('welcome');
});
Route::get('registro', [login::class, "registro"])->name("registro");
Route::post('registroPost', [login::class, "registroPost"])->name("registroPost");
Route::post("login", [login::class, "loginPost"])->name("loginPost");
Route::get("login", [login::class, "login"])->name("login");
Route::get('loginJwt/{jwt}', [login::class, "loginJwt"])->name("loginJwt");
Route::get('datosRegistro', [login::class, "dataRegister"])->name("dataRegister")->middleware("auth");;
Route::get('mainAdmin', [admin::class, "mainAdmin"])->name("mainAdmin")->middleware("auth");
Route::get('crearEmpresa', [admin::class, "crearEmpresa"])->name("crearEmpresa")->middleware("auth");
Route::post('crearEmpresaPost', [admin::class, "crearEmpresaPost"])->name("crearEmpresaPost")->middleware("auth");
Route::get('mainEmpresa', [login::class, "mainEmpresa"])->name("mainEmpresa")->middleware("auth");

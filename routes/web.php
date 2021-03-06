<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\empresa;
use App\Http\Controllers\empresaControler;
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
Route::get('datosRegistro', [empresaControler::class, "dataRegister"])->name("dataRegister")->middleware("auth");
Route::post('PostdatosRegistro', [empresaControler::class, "dataRegisterPost"])->name("dataRegisterPost")->middleware("auth");
Route::get('mainAdmin', [admin::class, "mainAdmin"])->name("mainAdmin")->middleware("auth");
Route::get('crearEmpresa', [admin::class, "crearEmpresa"])->name("crearEmpresa")->middleware("auth");
Route::post('crearEmpresaPost', [admin::class, "crearEmpresaPost"])->name("crearEmpresaPost")->middleware("auth");
Route::get('autorizarEmpresa/{ids}', [admin::class, "autorizarEmpresa"])->name("autorizarEmpresa")->middleware("auth");
Route::get('correoEmpresa/{ids}', [admin::class, "correoEmpresa"])->name("correoEmpresa")->middleware("auth");
Route::get('eliminarEmpresa/{ids}', [admin::class, "eliminarEmpresa"])->name("eliminarEmpresa")->middleware("auth");
Route::get('mainEmpresa', [empresa::class, "mainEmpresa"])->name("mainEmpresa")->middleware("auth");
Route::post('filtrar', [admin::class, "filtrar"])->name("filtrar")->middleware("auth");
Route::get('cerrar', [login::class, "cerrar"])->name("cerrar")->middleware("auth");
Route::post('UpdateDatosRegistro', [empresaControler::class, "UpdateDatosRegistro"])->name("UpdateDatosRegistro")->middleware("auth");
Route::post('enviarEmail', [admin::class, "enviarEmail"])->name("enviarEmail")->middleware("auth");

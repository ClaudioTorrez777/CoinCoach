<?php

use App\Http\Controllers\CriptomonedaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});



Auth::routes();
Route::resource('criptomonedas', CriptomonedaController::class);
Route::resource('ventas', \App\Http\Controllers\VentaController::class);
Route::resource('compras', \App\Http\Controllers\CompraController::class);
Route::resource('users', \App\Http\Controllers\UserController::class);
//Es necesario colocar una ruta nueva porque laravel solo genera las rutas para los metodos ya definidos por defecto
                //URL                                           //Controlador      //Metodo           //Nombre de la ruta
Route::put('usuario/{id}', [\App\Http\Controllers\UserController::class, 'actualizar'])->name('usuario.actualizar');

Route::resource('home', \App\Http\Controllers\HomeController::class);

<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/lista', [App\Http\Controllers\ListaController::class, 'index'])->middleware('auth')->name('lista');
Route::get('/contatos', [App\Http\Controllers\ContatoController::class, 'index'])->middleware('auth')->name('contatos');

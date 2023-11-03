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

Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/Contato', [\App\Http\Controllers\PrincipalController::class, 'contato'])->name('site.contato');
//Aplicativos protegidos
Route::prefix('/App')->group(function(){
    Route::get('/Chamada', [\App\Http\Controllers\ProdutoController::class, 'chamada'])->name('app.chamada');
    Route::get('/Financeiro', [\App\Http\Controllers\ProdutoController::class, 'financeiro'])->name('app.financeiro');
    Route::get('/Provas', [\App\Http\Controllers\ProdutoController::class, 'provas'])->name('app.provas');
    Route::get('/PracadeAlimentacao', [\App\Http\Controllers\ProdutoController::class, 'pracadealimentacao'])->name('app.pracaalimentacao');
    Route::get('/Estacionamento', [\App\Http\Controllers\ProdutoController::class, 'estacionamento'])->name('app.estacionamento');
});

Route::get('/login', [\App\Http\Controllers\PrincipalController::class, 'login'])->name('site.login');

/*
Route::get('/Sobrenos', function () {
    return view('sobrenos');
});
Route::get('/Contato', function () {
    return view('contato');
});
*/
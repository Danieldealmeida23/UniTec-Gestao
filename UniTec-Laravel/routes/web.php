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
Route::middleware([\App\Http\Middleware\AutenticacaoMiddleware::class])->prefix('/App')->group(function(){
    Route::get('/home', [\App\Http\Controllers\PrincipalController::class, 'principallogado'])->name('app.index');
    Route::get('', [\App\Http\Controllers\PrincipalController::class, 'principallogado'])->name('app.index');
    Route::get('/Chamada', [\App\Http\Controllers\ProdutoController::class, 'chamada'])->name('app.chamada');
    Route::get('/Financeiro', [\App\Http\Controllers\ProdutoController::class, 'financeiro'])->name('app.financeiro');
    Route::get('/Pagamento', [\App\Http\Controllers\EstacionamentoController::class, 'pagamentoEstacionamento'])->name('app.financeiroestacionamento');
    Route::get('/Provas', [\App\Http\Controllers\ProdutoController::class, 'provas'])->name('app.provas');
    Route::get('/PracadeAlimentacao', [\App\Http\Controllers\ProdutoController::class, 'pracadealimentacao'])->name('app.pracaalimentacao');
    Route::get('/Estacionamento', [\App\Http\Controllers\EstacionamentoController::class, 'estacionamento'])->name('app.estacionamento');
    Route::get('/Estacionamento/ocupar/{id_vaga}', [\App\Http\Controllers\EstacionamentoController::class, 'ocuparvaga'])->name('app.ocuparvaga');
});

Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class, 'login'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');
Route::get('/logout}', [\App\Http\Controllers\LoginController::class, 'logout'])->name('site.logout');


/*
Route::get('/Sobrenos', function () {
    return view('sobrenos');
});
Route::get('/Contato', function () {
    return view('contato');
});
*/
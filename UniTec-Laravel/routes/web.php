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
Route::get('/gabarito/{id_prova}', [\App\Http\Controllers\PrincipalController::class, 'exibeGabarito'])->name('site.gabarito');
//Aplicativos protegidos
Route::middleware([\App\Http\Middleware\AutenticacaoMiddleware::class])->prefix('/App')->group(function(){
    Route::get('/home', [\App\Http\Controllers\PrincipalController::class, 'principallogado'])->name('app.index');
    Route::get('', [\App\Http\Controllers\PrincipalController::class, 'principallogado'])->name('app.index');
    Route::get('/Chamada', [\App\Http\Controllers\ProdutoController::class, 'chamada'])->name('app.chamada');
    Route::get('/financeiro', [\App\Http\Controllers\FinanceiroController::class, 'financeiro'])->name('app.financeiro');
    Route::get('/Pagamento', [\App\Http\Controllers\EstacionamentoController::class, 'pagamentoEstacionamento'])->name('app.financeiroestacionamento');
    Route::get('/Provas', [\App\Http\Controllers\ProdutoController::class, 'provas'])->name('app.provas');
    Route::get('/Provas/Cadastrar', [\App\Http\Controllers\ProvaController::class, 'provas'])->name('app.cadastrarprovas');
    Route::post('/Provas/Cadastrar', [\App\Http\Controllers\ProvaController::class, 'cadastrarprovas'])->name('app.cadastrarprovas');
    Route::get('/Provas/Visualizar', [\App\Http\Controllers\ProvaController::class, 'visualizarprovas'])->name('app.visualizarprovas');
    Route::get('/Provas/Consulta/{id_prova?}', [\App\Http\Controllers\ProvaController::class, 'consultaprova'])->name('app.consultaprova');
    Route::get('/pracadeAlimentacao', [\App\Http\Controllers\PracaAlimentacaoController::class, 'pracadealimentacao'])->name('app.pracaalimentacao');
    Route::get('/consultaCardapio/{id_loja?}', [\App\Http\Controllers\PracaAlimentacaoController::class, 'consultarcardapio'])->name('app.consultacardapio');
    Route::get('/realizarPedido/{id_item?}/{qtd?}', [\App\Http\Controllers\PracaAlimentacaoController::class, 'realizarpedido'])->name('app.pedirpracaalimentacao');
    Route::get('/estacionamento', [\App\Http\Controllers\EstacionamentoController::class, 'estacionamento'])->name('app.estacionamento');
    Route::get('/estacionamento/ocupar/{id_vaga}', [\App\Http\Controllers\EstacionamentoController::class, 'ocuparvaga'])->name('app.ocuparvaga');
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
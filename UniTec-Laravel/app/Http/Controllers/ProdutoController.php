<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function chamada (){
        return view('app/chamada/index', ['titulo' => 'Chamada','idUsuario' => '', 'aula' => '', 'curso' => '', 'sessao' => '']);
    }
    public function financeiro(){
        return view('app/financeiro/index', ['titulo' => 'Financeiro']);
    }
    public function provas(){
        return view('app/provas/index', ['titulo' => 'Provas']);
    }
    public function estacionamento(){
        return view('app/estacionamento/index', ['titulo' => 'Estacionamento']);
    }
    public function pracadealimentacao(){
        return view('app/pracadealimentacao/index', ['titulo' => 'Praça de Alimentação']);
    }
}

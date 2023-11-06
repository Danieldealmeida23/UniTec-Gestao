<?php

namespace App\Http\Controllers;
use App\Models\Pessoa;
use App\Models\Prova;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(Request $request){

        return view('site.principal', ['titulo' => 'Bem-vindo']);

    }

    public function principallogado(Request $request){
        $dados = (new Pessoa())->where('id_pessoa', $_SESSION['pessoa'])->get();
        return view('site.principal', 
                        ['titulo' => 'Bem-vindo '.$dados[0]->nome_pessoa,
                         'nome'=>$dados[0]->nome_pessoa]
                    );


    }

    public function exibeGabarito($id_prova){
        $localProva=(new Prova())
                    ->where('id_prova', $id_prova)->get();
        return redirect($localProva[0]->local_arquivo);
    }


}


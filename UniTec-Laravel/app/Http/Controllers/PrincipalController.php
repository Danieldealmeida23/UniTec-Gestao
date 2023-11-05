<?php

namespace App\Http\Controllers;
use App\Models\Pessoa;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(Request $request){
        //if logado
        return view('site.principal', ['titulo' => 'Bem-vindo']);
        //if naologado
    }

    public function principallogado(Request $request){
        $pessoa = new Pessoa();
        $dados = $pessoa->where('id_pessoa', $_SESSION['pessoa'])->get();
        return view('site.principal', ['titulo' => 'Bem-vindo '.$dados[0]->nome_pessoa,'nome'=>$dados[0]->nome_pessoa]);
        //if naologado
    }


}


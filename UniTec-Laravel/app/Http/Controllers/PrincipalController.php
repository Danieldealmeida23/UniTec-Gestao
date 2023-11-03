<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(Request $request){
        //if logado
        return view('site.principal', ['titulo' => 'Bem-vindo']);
        //if naologado
    }

    public function principallogado(Request $request){
        return view('site.principal', ['titulo' => 'Bem-vindo']);
        //if naologado
    }


}


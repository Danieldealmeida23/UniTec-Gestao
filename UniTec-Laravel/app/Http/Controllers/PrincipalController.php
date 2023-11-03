<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function principal(){
        //if logado
        return view('site.principal', ['titulo' => 'Bem-vindo']);
        //if naologado
    }
}

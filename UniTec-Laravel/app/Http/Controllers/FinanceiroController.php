<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Financeiro;

class FinanceiroController extends Controller
{
    public function financeiro(Request $request){
        $erro = "" ;
        if($request->get('erro') == 3){
            $erro = "";
        }else if($request->get('erro') == 2){
            $erro = "";
        };
        return view('app/financeiro/index', ['titulo' => 'Financeiro', 'erro'=>$erro]);
    }
}

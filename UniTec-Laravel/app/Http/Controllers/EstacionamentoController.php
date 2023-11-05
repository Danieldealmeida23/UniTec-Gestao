<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Financeiro;
use App\Models\Estacionamento;
use App\Models\FinanceiroEstacionamento;

class EstacionamentoController extends Controller
{
    public function estacionamento(Request $request){
        $erro = '' ;
        if($request->get('erro') == 3){
            $erro = "Esta vaga já está em uso !";
        }else if($request->get('erro') == 2){
            $erro = "";
        };


        return view('app/estacionamento/index', ['titulo' => 'Estacionamento', 'erro'=> $erro]);
    }

    public function ocuparvaga($id_vaga){
        $tabelafinaceiro = new Financeiro();
        $tabelaestacionamento = new Estacionamento();
        $tabelafinanceiroestacionamento = new FinanceiroEstacionamento();
        $consultatabelafinanceiroestacionamento = new FinanceiroEstacionamento();

        $liberacaoestacionamento = $tabelaestacionamento->where('id_vaga', $id_vaga)->orWhere('id_ocupante', '')->orWhere('id_ocupante', null)->get();

        if($liberacaoestacionamento[0]->status_vaga != 'ocupado'){

            $liberacaoestacionamento = $tabelaestacionamento->where('id_vaga', $id_vaga)->orWhere('id_ocupante', '')->orWhere('id_ocupante', null);
            $liberacaoestacionamento->update(['status_vaga'=>'ocupado','data_hora_entrada'=>date('y-m-d h:i'),'id_usuario_ocupante'=>$_SESSION['pessoa']]);
            $tabelafinanceiroestacionamento->create(['id_vaga'=>$id_vaga,'id_usuario'=>$_SESSION['pessoa'], 'status_pagamento'=>'']);
            $selecionausoestacionamento = $consultatabelafinanceiroestacionamento->where('status_pagamento','')->where('id_usuario',$_SESSION['pessoa'])->get();
            $tabelafinaceiro->create(['id_usuario'=>$_SESSION['pessoa'], 'status_pg'=>'','id_uso_estacionamento'=>$selecionausoestacionamento[0]->id_uso_estacionamento,'valor'=>8.0,'descricao'=>'ESTACIONAMENTO','data_parcela'=>date('y-m-d h:i')]);
            return redirect(route('app.estacionamento'));

        }else{
            return redirect()->route('app.estacionamento', ['erro' => 3]);
        }


    }

    public function pagamentoestacionamento(Request $request){
        $tabelafinaceiro = new Financeiro();
        $tabelaestacionamento = new Estacionamento();
        $tabelafinanceiroestacionamento = new FinanceiroEstacionamento();

        $pagamentofinanceiro = $tabelafinaceiro->where('id_usuario', $_SESSION['pessoa'])->where('status_pg', '');
        $pagamentofinanceiro->update(['status_pg'=>'pago', 'cond_pg'=>'PIX', 'data_pagamento'=> date('y-m-d h:i')]);
        $pagamentofinanceiroestacionamento = $tabelafinanceiroestacionamento->where('id_usuario', $_SESSION['pessoa'])->where('status_pagamento', '');
        $pagamentofinanceiroestacionamento->update(['status_pagamento'=>'pago', 'data_hora_saida'=>date('y-m-d h:i')], 'valor');
        $liberacaoestacionamento = $tabelaestacionamento->where('id_usuario_ocupante', $_SESSION['pessoa'])->where('status_vaga', 'ocupado');
        $liberacaoestacionamento->update(['status_vaga'=>'','data_hora_entrada'=>'','id_usuario_ocupante'=>'']);
        return redirect(route('app.estacionamento'));
    
    }
}

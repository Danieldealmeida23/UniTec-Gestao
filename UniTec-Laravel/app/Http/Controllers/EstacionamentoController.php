<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Financeiro;
use App\Models\Estacionamento;
use App\Models\FinanceiroEstacionamento;

class EstacionamentoController extends Controller
{
    public function estacionamento(Request $request){
        $erro = "" ;
        if($request->get('erro') == 3){
            $erro = "Esta vaga já está em uso !";
        }else if($request->get('erro') == 2){
            $erro = "";
        };
        return view('app/estacionamento/index', ['titulo' => 'Estacionamento', 'erro'=> $erro]);
    }


    public function ocuparvaga($id_vaga){

        //consulta da vaga na tabela Estacionamentos para verificar se está ocupada
        $liberacaoestacionamento = (new Estacionamento())
                ->where('id_vaga', $id_vaga)
                ->orWhere('id_ocupante', '')
                ->orWhere('id_ocupante', null)
                ->get();

        if($liberacaoestacionamento[0]->status_vaga != 'ocupado'){

            //consulta na tabela estacionamento para posterior atualização do campo status vaga para ocupação
            $liberacaoestacionamento = (new Estacionamento())
                                        ->where('id_vaga', $id_vaga)
                                        ->orWhere('id_ocupante', '')
                                        ->orWhere('id_ocupante', null);
                        
            //ocupação da vaga na tabela estacionamento para controle das vagas que estão disponíveis.
            $liberacaoestacionamento->update(
                                        ['status_vaga'=>'ocupado',
                                        'data_hora_entrada'=>date('y-m-d h:i'),
                                        'id_usuario_ocupante'=>$_SESSION['pessoa']]
                                    );

            //Criação do ticket financeiro-estacionamento para controle de pagamento e saída
            (new FinanceiroEstacionamento())
                ->create(
                            ['id_vaga'=>$id_vaga,
                            'id_usuario'=>$_SESSION['pessoa'],
                            'status_pagamento'=>'']
                        );

            //consulta do numero de uso do estacionamento na tabela financeiro_estacionamentos
            //para uso na criação do ticket financeiro
            $selecionausoestacionamento = (new FinanceiroEstacionamento())
                                            ->where('status_pagamento','')
                                            ->where('id_usuario',$_SESSION['pessoa'])
                                            ->get();

            //Criação do ticket financeiro para a vaga de esacionamento
            (new Financeiro())
                ->create(   
                            ['id_usuario'=>$_SESSION['pessoa'],
                            'status_pg'=>'',
                            'id_uso_estacionamento'=>$selecionausoestacionamento[0]->id_uso_estacionamento,
                            'valor'=>8.0,'descricao'=>'Estacionamento',
                            'data_parcela'=>date('y-m-d h:i'),
                            'data_vencimento'=>date('y-m-d')]
                        );

            return redirect(route('app.estacionamento'));

        }else{
            return redirect()->route('app.estacionamento', ['erro' => 3]);
        }


    }

    public function pagamentoestacionamento(Request $request){

        $pagamentofinanceiro = (new Financeiro())
                                    ->where('id_usuario', $_SESSION['pessoa'])
                                    ->where('status_pg', '')
                                    ->where('descricao', 'Estacionamento');

        $pagamentofinanceiro->update(
                                        ['status_pg'=>'pago',
                                         'cond_pg'=>'PIX',
                                         'data_pagamento'=> date('y-m-d h:i')
                                        ]
                                    );

        $pagamentofinanceiroestacionamento = (new FinanceiroEstacionamento())
                                                ->where('id_usuario', $_SESSION['pessoa'])
                                                ->where('status_pagamento', '');

        $pagamentofinanceiroestacionamento->update(
                                                    ['status_pagamento'=>'pago',
                                                     'data_hora_saida'=>date('y-m-d h:i')],
                                                );

        $liberacaoestacionamento = (new Estacionamento())
                                        ->where('id_usuario_ocupante', $_SESSION['pessoa'])
                                        ->where('status_vaga', 'ocupado');

        $liberacaoestacionamento->update(
                                            ['status_vaga'=>'',
                                             'data_hora_entrada'=>'',
                                             'id_usuario_ocupante'=>'']
                                        );

        return redirect(route('app.estacionamento'));
    
    }
}

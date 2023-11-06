<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cardapio;
use App\Models\Lanchonetes;
use App\Models\Pedido;
use App\Models\Financeiro;

class PracaAlimentacaoController extends Controller
{
    public function pracadealimentacao(Request $request){
        $erro = "" ;
        if($request->get('erro') == 3){
            $erro = "";
        }else if($request->get('erro') == 2){
            $erro = "";
        };
        return view('app/pracadealimentacao/index', ['titulo' => 'Praça de Alimentação', 'erro'=>$erro]);
    }

    public function consultarcardapio($id_loja){
        
        $itens_cardapio = (new Cardapio())
                            ->where('id_loja', $id_loja)->get();

        return $itens_cardapio;
    }

    public function realizarpedido($id_item, $qtd){
        (new Pedido())->create(
                            ['id_pedido'=>random_int(50,300),
                            'id_pedido_item'=>$id_item,
                            'qtd_item'=>$qtd,
                            'id_usuario'=>$_SESSION['pessoa'],
                            'status_pedido'=>""]
        );

        $id_pedido = (new Pedido())->where('id_usuario', $_SESSION['pessoa'])->where('status_pedido', "")->get();
        $preco_item = (new Cardapio())->where('id_item', $id_item)->get();

        (new Financeiro())->create(
                                ['id_usuario'=>$_SESSION['pessoa'],
                                'id_pedido'=>$id_pedido[0]->id_pedido,
                                'valor'=>(floatval($preco_item[0]->item_preco) * floatval($qtd)),
                                'descricao'=>'Pedido Lanchonete',
                                'data_parcela'=>date('y-m-d h:i'),
                                'status_pg'=>'',
                                'data_vencimento'=>date('y-m-d')
                                ]
        );

        return redirect()->route('app.financeiro');

    }
}

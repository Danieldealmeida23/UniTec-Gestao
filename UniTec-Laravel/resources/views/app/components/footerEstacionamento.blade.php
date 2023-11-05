@php

use App\Models\Estacionamento;
use App\Models\Financeiro;
use App\Models\FinanceiroEstacionamento;

$estacionamento = new Estacionamento();
$vaga_estacionamento = $estacionamento->where('id_usuario_ocupante', $_SESSION['pessoa'])->get();


@endphp
<footer class="page-footer font-small teal pt-4 bg-secondary text-white">    
    <div class="container-fluid text-center text-md-left">
        <div class="row">
          <div class="col-md-4 mt-md-0 mt-3">
    
            <h6 class="text-uppercase font-weight-bold"><strong>Pagamento</strong></h6>
            <a href="{{route('app.financeiroestacionamento')}}"><button class="btn bg-primary text-light" >Cartão</button></a>
            <button class="btn bg-success text-light">PIX</button>
    
          </div>
    
          <hr class="clearfix w-100 d-md-none pb-3">
    
          <div class="col-md-4 mb-md-2 mb-3 bg-light text-dark rounded">
            <br>
@php
        $financeiro_estacionamento = new Financeiro();
        $consulta_financeira = $financeiro_estacionamento->where('id_usuario', $_SESSION['pessoa'])->where('status_pg', '')->orWhere('status_pg', null)->get();
        $id_estacionamento = new FinanceiroEstacionamento();
        $consulta_id_estacionamento = $id_estacionamento->where('id_usuario', $_SESSION['pessoa'])->where('status_pagamento', '')->get();
            echo "<h6 class='text-uppercase font-weight-bold'><strong>Liberação do Veículo</strong></h6>";
            if(isset($consulta_financeira[0]) && isset($consulta_id_estacionamento[0]) ){
              if(($consulta_financeira[0]->status_pg == "" || $consulta_financeira[0]->status_pg == null) && $consulta_financeira[0]->id_uso_estacionamento == $consulta_id_estacionamento[0]->id_uso_estacionamento){
                echo "<small>Pendente de pagamento</small><br>";
              }else{

              }
            }else{
              echo "<small>Veículo não alocado</small><br>";
            }
            
            
@endphp
          </div>
          <div class="col-md-4 mb-md-0 mb-3">
    
            <h6 class="text-uppercase font-weight-bold"><strong>Informação da vaga ocupada</strong></h6>
@php
if(isset($vaga_estacionamento) && $vaga_estacionamento != '[]'){
            echo "<small>Área/Vaga ".$vaga_estacionamento[0]->loc_vaga."</small><br>";
            echo "<small>Horário de chegada: ".str_replace("-", "/", date('d-m-y h:i', strtotime($vaga_estacionamento[0]->data_hora_entrada)))."</small><br>";
            echo "<small>Valor: R$ 8,00</small>";
};
@endphp
    
          </div>
        </div>
      </div>

</footer>


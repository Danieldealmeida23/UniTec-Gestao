<h3 class="d-flex justify-content-center">Pendências</h3>
<table class='table'>
<thead>
    <tr>
        <th scope="col">Lançamento</th>
        <th scope="col">Data do lançamento</th>
        <th scope="col">Descrição</th>
        <th scope="col">Preço</th>
        <th scope="col">Data de Vencimento</th>
        <th scope="col">Situação</th>
        <th scope="col">Ação</th>
      </tr>
</thead>
<tbody>
@php
use App\Models\Financeiro;

$consulta = (new Financeiro())
                ->where('id_usuario', $_SESSION['pessoa'])
                ->where('status_pg', '')
                ->orderBy('data_parcela', 'desc')->get();

$contagem = 1;

foreach($consulta as $c){

    if($c->status_pg == ""){
        $situacao = "Pendente";
    }else{
        $situacao = "Pago";
    }

    echo "<tr>";
    echo "<th scope='row'>".$contagem."</th>";
    echo "<td>".str_replace("-", "/", date('d-m-y h:i', strtotime($c->data_parcela)))."</td>";  
    echo "<td>".$c->descricao."</td>";
    echo "<td> R$ ".number_format(floatval($c->valor), 2)."</td>"; 

    if(isset($c->data_vencimento) && $c->data_vencimento != ""){
        echo "<td>".str_replace("-", "/", date('d-m-y', strtotime($c->data_vencimento)))."</td>";
    }else{
        echo "<td> - </td>";
    }

    echo "<td>".$situacao."</td>";


    if($situacao == "Pendente"){
        $rotaEstacionamento = '';
        if($c->descricao == "ESTACIONAMENTO" || $c->descricao == "Estacionamento"){
            $rotaEstacionamento = route('app.estacionamento');
            echo "<td><input type=button class='btn btn-info text-dark' onclick=location.href='".route('app.estacionamento')."' value='Pagar'></td>";
        }else{
            echo "<td><button class='btn btn-info text-dark'> Pagar </button></td>";
        }
    }

    echo "</tr>";

    $contagem +=1;
}

@endphp

</tbody>
</table>

<h3 class="d-flex justify-content-center">Histórico</h3>
<br>
<table class='table'>
    <thead>
        <tr>
            <th scope="col">Lançamento</th>
            <th scope="col">Data do lançamento</th>
            <th scope="col">Descrição</th>
            <th scope="col">Preço</th>
            <th scope="col">Data de Vencimento</th>
            <th scope="col">Situação</th>
          </tr>
    </thead>
    <tbody>
    @php
    
    $consulta = (new Financeiro())
                    ->where('id_usuario', $_SESSION['pessoa'])
                    ->where('status_pg', 'pago')
                    ->orderBy('data_parcela', 'desc')->get();
    
    $contagem = 1;
    
    foreach($consulta as $c){
    
        if($c->status_pg == ""){
            $situacao = "Pendente";
        }else{
            $situacao = "Pago";
        }
    
        echo "<tr>";
        echo "<th scope='row'>".$contagem."</th>";
        echo "<td>".str_replace("-", "/", date('d-m-y h:i', strtotime($c->data_parcela)))."</td>";  
        echo "<td>".$c->descricao."</td>";
        echo "<td> R$ ".number_format(floatval($c->valor), 2)."</td>"; 
    
        if(isset($c->data_vencimento) && $c->data_vencimento != ""){
            echo "<td>".str_replace("-", "/", date('d-m-y', strtotime($c->data_vencimento)))."</td>";
        }else{
            echo "<td> - </td>";
        }
    
        echo "<td>".$situacao."</td>";
    
    
        echo "</tr>";
    
        $contagem +=1;
    }
    
    @endphp
    
    </tbody>
    </table>
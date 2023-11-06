<div class="col-4">
    <h2 class="d-flex justify-content-center">Lojas</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Lanchonete</th>
                <th scope="col">Sala</th>
              </tr>
        </thead>
        <tbody>
    @php
        use App\Models\Lanchonetes;
        use App\Models\Cardapio;
        use App\Models\Pedido;
        use App\Models\Pessoa;
        use App\Models\Usuario;


        $consulta = (new Lanchonetes())->get();
        foreach($consulta as $c){
            $usuario = (new Usuario())
                            ->where('id_usuario', $c->id_usuario)->get();

            $dados = (new Pessoa())
                            ->where('id_pessoa', $usuario[0]->id_pessoa)->get();
                            
            echo "<tr onclick='consultaCardapio(".$c->id_loja.")'>";
            echo "<th scope='row'></th>";  
            echo "<td>".$dados[0]->nome_fantasia."</td>";
            echo "<td> ".$c->sala."</td></a>"; 
            echo "</tr>";

        }

    @endphp
    </tbody>
</table>
</div>
<div class="col-8">
    <h2 class="d-flex justify-content-center">Cardápio</h2>
    <table class="table" >
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Item</th>
                <th scope="col">Preço</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Ação</th>
              </tr>
        </thead>
        <tbody id="tabelaCardapio">


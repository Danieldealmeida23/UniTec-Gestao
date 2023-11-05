<div id="estacionamento">
    @php
        use App\Models\Pessoa;
        use App\Models\Estacionamento;
        use App\Models\FinanceiroEstacionamento;

        $estacionamento = new Estacionamento();
        $vagas_estacionamento = $estacionamento->all();
        $vagaocupada = new FinanceiroEstacionamento();
        $vaga_estacionamento = $vagaocupada->where('id_usuario', $_SESSION['pessoa'])->where('data_hora_saida', null)->get();

        if(isset($vaga_estacionamento) && $vaga_estacionamento != '[]'){
            $id_vaga_estacionamento = $vaga_estacionamento[0]->id_vaga;
            echo "<div class='row mr-0 '>";
            echo "<div class='col-6'>";
            if(isset($id_vaga_estacionamento) && $id_vaga_estacionamento != '[]'){
                $valida_vaga = "minhaVaga";
                $minhaVaga = $id_vaga_estacionamento;
            }else{
                $valida_vaga = "";
            }

            foreach($vagas_estacionamento as $e){
                if($e->id_vaga == $minhaVaga){
                    echo "<button class='vaga-estacionamento btn ".$e->status_vaga." ".$valida_vaga." mx-2'>";
                    echo $e->loc_vaga."</button>";
                }
                if($e->id_vaga == 9 || $e->id_vaga == 29 && $e->id_vaga != $minhaVaga){
                    echo "<button class='vaga-estacionamento btn ".$e->status_vaga."'>";
                    echo $e->loc_vaga."</button><hr>";

                }elseif($e->id_vaga == 19 && $e->id_vaga != $minhaVaga){
                    echo "<button class='vaga-estacionamento btn ".$e->status_vaga." '>";
                    echo $e->loc_vaga."</button><br><br></div><div class='col-6'>";
                }elseif($e->id_vaga == 39 && $e->id_vaga != $minhaVaga){
                    echo "<button class='vaga-estacionamento btn ".$e->status_vaga." '>";
                    echo $e->loc_vaga."</button><br><br></div></div><div class='row mr-0'><br><br><br>";
                }elseif($e->loc_vaga == "" && $e->id_vaga != $minhaVaga){

                }elseif($e->id_vaga != $minhaVaga){
                    echo "<button class='vaga-estacionamento btn ".$e->status_vaga." mx-2'>";
                    echo $e->loc_vaga."</button>";
                }
            
            };
        }else{
            echo "<div class='row mr-0 '>";
            echo "<div class='col-6'>";
                foreach($vagas_estacionamento as $e){
                    if($e->id_vaga == 9 || $e->id_vaga == 29){
                        echo "<a href='".route('app.ocuparvaga', ['id_vaga'=>$e->id_vaga])."'><button class='vaga-estacionamento btn ".$e->status_vaga."' >";
                        echo $e->loc_vaga."</button></a><hr>";
                    }elseif($e->id_vaga == 19){
                        echo "<a href='".route('app.ocuparvaga', ['id_vaga'=>$e->id_vaga])."'><button class='vaga-estacionamento btn ".$e->status_vaga." '>";
                        echo $e->loc_vaga."</button></a><br><br></div><div class='col-6'>";
                    }elseif($e->id_vaga == 39){
                        echo "<a href='".route('app.ocuparvaga', ['id_vaga'=>$e->id_vaga])."'><button class='vaga-estacionamento btn ".$e->status_vaga." '>";
                        echo $e->loc_vaga."</button></a><br><br></div></div><div class='row mr-0'><br><br><br>";
                    }elseif($e->loc_vaga == ""){
                    }else{
                        echo "<a href='".route('app.ocuparvaga', ['id_vaga'=>$e->id_vaga])."'><button class='vaga-estacionamento btn ".$e->status_vaga." mx-2'>";
                        echo $e->loc_vaga."</button></a>";
                    }
                
                };
            }
        echo "</div>";
        

    @endphp

</div>
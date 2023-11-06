@php
use App\Models\Usuario;
use App\Models\Materia;
use App\Models\Pessoa;
use App\Models\Prova;
use App\Models\Curso;

$consulta_usuario = (new Usuario())->where('id_professor', $_SESSION['professor'])->get();
$consulta_pessoa = (new Pessoa())->where('id_pessoa', $_SESSION['pessoa'])->get();
$consulta_materia = (new Materia())->where('id_curso', $_SESSION['curso'])->get();
@endphp
<div class="row">
    <div class="col-3">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Materia</th>
                    <th scope="col">Data de Publicação</th>
                  </tr>
            </thead>
        @php
        foreach($consulta_materia as $c){
            $consulta_prova = (new Prova())
                                ->where('id_materia', $c->id_materia)->get();

            $consulta_dados = (new Materia())
                                ->where('id_materia', $c->id_materia)->get();

            if($consulta_prova->isNotEmpty()){
                echo "<tr onclick=window.open('".$consulta_prova[0]->local_arquivo."')>";
                echo "<th scope='row'></th>";  
                echo "<td>".$consulta_dados[0]->nome_materia."</td>";
                echo "<td> ".$c->created_at."</td></a>"; 
                echo "</tr>";
            }
        }
        @endphp
        </table>
    </div>
    <div clas="col">
        <canvas id="pdf"></canvas>
    </div>
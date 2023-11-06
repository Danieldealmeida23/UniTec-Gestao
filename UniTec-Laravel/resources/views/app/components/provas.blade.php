@php
use App\Models\Usuario;
use App\Models\Materia;
use App\Models\Pessoa;
use App\Models\Prova;

$consulta_usuario = (new Usuario())->where('id_professor', $_SESSION['professor'])->get();
$consulta_pessoa = (new Pessoa())->where('id_pessoa', $_SESSION['pessoa'])->get();
$consulta_materia = (new Materia())->get();
$consulta_provas = (new Prova())->where('id_professor', $_SESSION['professor'])->get();
@endphp

<div class="col-3 ">
    <form  action={{ route('app.cadastrarprovas') }} method="POST" class="border border-secondary form-login-border">
        @csrf
    <h3>Cadastro</h3><br>
    <label>Professor / Usuario: </label>
    <input type="text" disabled value="{{ $consulta_pessoa[0]->nome_pessoa }}"><br><br>
    <label> Matéria : </label>
    <input name="materia" list="materias" id="escolhaMateria" name="escolhaMateria">
    <datalist id="materias">

@php
        foreach($consulta_materia as $c){
            echo "<option value=".$c->id_materia.">".$c->nome_materia."</option>";
        }

@endphp
    </datalist><br><br>
    <label>Link do gabarito: </label>
    <input type="text" name="linkpdf" id="linkpdf">
<br><br>
    <input type="submit" value="Salvar">
</div><br>
</form>

<div class="col-9">
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Materia</th>
                        <th scope="col">Data de Publicação</th>
                      </tr>
                </thead>
            @php
            foreach($consulta_provas as $c){
                $usuario = (new Usuario())
                                ->where('id_usuario', $c->id_professor)->get();
                $consultaMateria = (new Materia())->where('id_materia', $c->id_materia)->get();

                                
                echo "<tr onclick='consultaLink(".$c->id_prova.")'>";
                echo "<th scope='row'></th>";  
                echo "<td>".$consultaMateria[0]->nome_materia."</td>";
                echo "<td> ".$c->created_at."</td></a>"; 
                echo "</tr>";

            }
            @endphp
            </table>

        </div>

        <div class="col">
            <div id="qrCode">
            </div>
        </div>
    </div>
</div>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Curso;
use App\Models\Materia;
use App\Models\Aula;

class ProdutoController extends Controller
{
    public function chamada (){
        if(isset($_SESSION['professor']) && $_SESSION['professor'] != ""){
            $pessoa = new Pessoa();
            $dados = $pessoa->where('id_pessoa', $_SESSION['pessoa'])->get();
            $curso = (new Aula())->where('id_professor', $_SESSION['professor'])->get();
            return view('app/chamada/index', ['titulo' => 'Chamada','nome' => $dados[0]->nome_pessoa, 'curso' => 'ADS - Análise e Desenvolvimento de sistemas', 'aula' => 'Lógica de Programação']);
        }else{
            echo "Usuário não autorizado a acessar esta aplicação !";
            return "    <script>
            setTimeout(function() {
                window.location.href = 'home'
            }, 2000); // 2 second
         </script>";
        }    
    }
    public function financeiro(){
        return view('app/financeiro/index', ['titulo' => 'Financeiro']);
    }
    public function provas(){
        return view('app/provas/index', ['titulo' => 'Provas']);
    }
    public function pracadealimentacao(){
        return view('app/pracadealimentacao/index', ['titulo' => 'Praça de Alimentação']);
    }
}

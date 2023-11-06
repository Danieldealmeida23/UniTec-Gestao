<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prova;


class ProvaController extends Controller
{
    public function provas(){
        return view('app/provas/index', ['titulo' => 'Provas']);
    }

    public function cadastrarprovas(Request $request){
        $professor = $_SESSION['professor'];
        $materia = $request->get('materia');
        $pdf = $request->get('linkpdf');

        (new Prova)->create([
            'local_arquivo'=>$pdf,
            'id_materia'=>$materia,
            'id_professor'=>$_SESSION['professor']
        ]);

        return redirect(route('app.cadastrarprovas'));

    }

    public function consultaprova($id_prova){
        $link = (new Prova())->where('id_prova', $id_prova)->get();
        
        $qrcode_dados = $link[0]->local_arquivo;
        $qrcode= (new \chillerlan\QRCode\QRCode())->render($qrcode_dados);

        return $qrcode;

    }

    public function visualizarprovas(){
        return view('app/provas/visualizar', ['titulo' => 'Provas']);
    }

}

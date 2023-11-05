@extends('base.layout')

@section('title', $titulo)

@if(isset($nome))
    @section('bemvindo')
    <div class="mensagem-inicio d-flex justify-content-center">
        <h2 class="text-light">Bem-vindo Professor(a) 
            @php
                echo $nome;   
            @endphp

        </h2>
    </div>
    @endsection
@endif

    @section('content')
    <div class="d-flex justify-content-center ">
        <div class="content-chamada text-strong">
            <strong>
                @php
                    echo "Professor: $nome";
                    echo "<br>";
                    echo "Curso: $curso";
                    echo "<br>";
                    echo "Aula: $aula";
                @endphp
            </strong>
            @component('app.components.qrcodechamada',['aula' => $aula,'curso' => $curso])
            
            @endcomponent
        </div>
    </div>

    @endsection
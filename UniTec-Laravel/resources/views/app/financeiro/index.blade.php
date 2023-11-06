@extends('base.layout')
@section('title', $titulo)
@section('bemvindo')
<div class="mensagem-inicio d-flex justify-content-center">
    <h2 class="text-light">
        Financeiro
    </h2>
</div>
@endsection
@section('content')

<div class='row'>
    <div class='col-3 d-flex justify-content-center'>
        <h4>Filtro</h4>
        @php
            $filtro1 = "";   
        @endphp
    </div>
    <div class='col-9'>
        @component('app.components.consultafinanceira', ['filtro1'=>$filtro1])
            
        @endcomponent
    </div>
</div


@endsection
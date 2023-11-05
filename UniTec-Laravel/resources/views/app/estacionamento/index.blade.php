@extends('base.layout')
@section('title', $titulo)

@section('bemvindo')
<div class="mensagem-inicio d-flex justify-content-center">
    <h2 class="text-light">Estacionamento 

    </h2>
</div>
@endsection

@section('content')
    @component('app.components.estacionamento')
    @endcomponent
    <small class="text-danger">{{ isset($erro) && $erro != '' ? $erro : '' }}</small>
@endsection

@section('footer')
 @component('app.components.footerEstacionamento')
     
 @endcomponent
@endsection
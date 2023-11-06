@extends('base.layout')
@section('title', $titulo)
@section('bemvindo')
<div class="mensagem-inicio d-flex justify-content-center">
    <h2 class="text-light">
        Praça de Alimentação
    </h2>
</div>
@endsection
@section('content')
<div class="row">
        @component('app.components.lojas')
        @endcomponent
</div>
@endsection
@section('script')
@endsection
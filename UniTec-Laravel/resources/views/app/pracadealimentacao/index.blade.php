@extends('base.layout')
@section('title', $titulo)
@section('content')
    <div class="content-banner">
        <div id="slider">
            <img src="https://images.even3.com.br/ni9UYZeOQWhTnpC368BIQFl8BRw=/1100x440/smart/even3.blob.core.windows.net/banner/II-Encontro-de-Ciencias-Agrarias_SITE.107f2f88e9ed42cf98c1.png">
            <img src= "{{ Vite::asset('resources/img/index/tutorialcertificado.jpg') }}">
        </div>
    </div>

@endsection
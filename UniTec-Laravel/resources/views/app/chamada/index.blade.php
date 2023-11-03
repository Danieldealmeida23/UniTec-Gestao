@extends('base.layout')

@section('title', $titulo)


@section('content')
{{$titulo}}
    @component('app.components.qrcodechamada',['idUsuario' => $idUsuario,'aula' => $aula,'curso' => $curso, 'sessao' => $sessao])
    
    @endcomponent

@endsection
@extends('base.layout')

@section('title', $titulo)


@section('content')
<div class="form-login ">
    <form action={{ route('site.login') }} method="POST" class="border border-secondary form-login-border">
        <div class="d-flex justify-content-center text-secondary">
        <h3>Login</h3>
        </div><br>
        <div class="d-flex justify-content-center">
            <div class="form-group">
                @csrf
                <input name="usuario" value="{{old('usuario')}}" type="text" placeholder="Usuario" class="form-control">
                <small class="text-danger">{{ $errors->has('usuario') ? $errors->first('usuario') : "" }}</small>
                <br>
                <input name="senha" type="password" value="{{old('senha')}}" placeholder="Senha" class="form-control">
                <small class="text-danger">{{ $errors->has('senha') ? $errors->first('senha') : '' }}</small>
            </div>
            <div class="form-group d-flex justify-content-center">

                <button type="submit" class="btn btn-success " >Acessar</button>
            </div>
        </div>
    </form>
    <small class="text-danger">{{ isset($erro) && $erro != '' ? $erro : '' }}</small>
</div>

@endsection
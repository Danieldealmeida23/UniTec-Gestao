
<div>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <img src="{{ Vite::asset('resources/img/patented/logo-unigoias-vertical.png') }}" width="130px" height="100px">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
@if(isset($_SESSION))
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('app.index')}}">Início</a>
                </li>
@endif
@if(!isset($_SESSION))
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('site.index')}}">Início</a>
                </li>
            </ul>
@endif
@if(isset($_SESSION))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('app.estacionamento')}}">Estacionamento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('app.pracaalimentacao')}}">Praça de Alimentação</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Provas
                    </a>
                    <div class="dropdown-menu" axria-labelledby="navbarDropdown">
@if(isset($_SESSION['professor']))
                        <a class="dropdown-item" href="{{route('app.cadastrarprovas')}}">Adicionar</a>
@endif
                        <a class="dropdown-item" href="{{route('app.visualizarprovas')}}">Visualizar</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('app.financeiro')}}">financeiro</a>
                </li>
            </ul>
@if(isset($_SESSION['professor']))
            <ul class="navbar-nav collapse navbar-collapse">
                <li class="nav-item">
                    <a class="nav-link " href="{{route('app.chamada')}}">Chamada</a>
                </li>
            </ul class="navbar-nav collapse navbar-collapse justify-content-end">
@endif
            <ul class="navbar-nav collapse navbar-collapse justify-content-end">
                <li class="nav-item">
                    <a href="{{route('site.logout')}}" class="btn btn-success ">Logout</a>

                </li>
            </ul>
@else
            <ul class="navbar-nav collapse navbar-collapse justify-content-center">
                <li class="nav-item">
                    <a href="{{ route('site.login') }}" class="btn btn-success">Login</a>
                </li>
            </ul>
@endif
        </div>
    </nav>
</div>

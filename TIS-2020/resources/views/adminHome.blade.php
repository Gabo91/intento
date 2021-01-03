@extends('layouts.appAdmin')
@if(Session::has('messagePass1'))
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('messagePass1')}}
        </div>
@endif
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".alert").fadeOut(1500);
    },3000);
});
</script>

@section('content')
<div class="container">
    <div class="row">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Bienvenido ADMINISTRADOR {{ Auth::user()->nombre }}</strong></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    Usted esta logueado con el cargo de ADMINISTRADOR
                    <br>
                    <br>
                    A continuacion se presenta las opciones que tiene con este cargo:
                </div>
                <br>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Usuarios</strong></h5>
                            <p class="card-text">Puede ver los usuarios registrados y tambien crear y editar usuarios.</p>
                            <a href="{{ url('/register') }}" class="btn btn-primary">Ir a Usuarios</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Registro de Unidades</strong></h5>
                            <p class="card-text">Puede ver las facultades y departamentos, editar y crear nuevas unidades.</p>
                            <a href="{{ url('/registrarUnidades') }}" class="btn btn-primary">Ir a Unidades</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Registro de Materias</strong></h5>
                            <p class="card-text">Puede ver las Materias registradas, editar y crear nuevas materias, tambien puede asignarles docentes a las materias.</p>
                            <a href="{{ url('/registrarMaterias') }}" class="btn btn-primary">Ir a Materias</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Herramientas y Plataformas</strong></h5>
                            <p class="card-text">Puede ver las Herramientas y plataformas que se utilizan en los formularios.</p>
                            <a href="{{ url('/registrarPlataformasHerramientas') }}" class="btn btn-primary">Ir a Herramientas y Plataformas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

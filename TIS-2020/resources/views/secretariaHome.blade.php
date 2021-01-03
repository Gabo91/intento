@extends('layouts.appSecretaria')
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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido: {{ Auth::user()->nombre }}</div>
                <br>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        En este momento se encuentra logueado con el cargo de SECRETARIA, a continuacion se muestra las opciones que usted tiene
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Reporte de asistencia</strong></h5>
                        <p class="card-text">Aqui puede ver los registros que se realizaron de los auxiliares.</p>
                        <a href="{{ url('/reporteAuxAsistencia') }}" class="btn btn-primary">Ir a Reporte</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Reporte para el DPA y UTI</strong></h5>
                        <p class="card-text">Aqui pueden verse los reportes para enviar al DPA y UTI.</p>
                        <a href="{{ url('/reporteAuxDpaUti') }}" class="btn btn-primary">Ir a Reportes</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Reporte Resumen</strong></h5>
                        <p class="card-text">Aqui pueden verse los reportes de forma resumida.</p>
                        <a href="{{ url('/reporteAuxResumen') }}" class="btn btn-primary">Ir a Reporte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

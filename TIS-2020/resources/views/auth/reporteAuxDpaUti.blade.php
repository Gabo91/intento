@extends('layouts.appSecretaria')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Reporte para DPA y UTI</h2></div>
                <br>
                 <br>
                <!-- SEARCH FORM -->
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
            <br>
            <hr color="dark" size=3>
            <!-- Tabla de reportes -->
               <div class="text-center"> <h2>Registro de Reportes Semanales</h2> </div>
            <form method="POST" action="{{url('')}}"  >
                    {{ csrf_field() }}
                     <div class="row">
                                <div class="table  table-responsive">
                                <br>
                                    <table class="table table-bordered"  id="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Fecha de clase</th>
                                        <th scope="col">Fecha de registro</th>
                                        <th scope="col">Fecha de remplazo</th>
                                        <th scope="col">Nombre Completo</th>
                                        <th scope="col">Materia</th>
                                        <th scope="col">grupo</th>
                                        <th scope="col">Hora inicio</th>
                                        <th scope="col">Hora fin</th>
                                        <th scope="col" >Contenido de Clase</th>
                                        <th scope="col">plataformas</th>
                                        <th scope="col">herramientas</th>
                                        <th scope="col">url</th>
                                        <th scope="col">Observaciones</th>
                                        
                                       
                                       
                                    </tr>
                                    </thead>
                                    <!--codigo para leer base de datos tabla-->
                                     <tbody>
                                        <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td ></td>
                                        <td ></td>
                                        <td ></td>
                                        </tr>
                                     </tbody>
                                    </table>
                                </div>

                            </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.appSecretaria')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Reporte Resumen</h2></div>
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
                                        <th width="80px" scope="col">Fecha</th>
                                        <th scope="col">Nombre Completo</th>
                                        <th scope="col">N° de clases Asistidas</th>
                                        <th scope="col">N° de clases No Asistidas</th>
                                        <th scope="col">N° de clases Reemplazo</th>


                                        <th scope="col" width="160px">acciones</th>
                                    </tr>
                                    </thead>
                                    <!--codigo para leer base de datos tabla-->
                                     <tbody>
                                        <tr class="">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>



                                        <td >
                                            <a href="#" class="show-modal btn btn-info btn-sm" data-id="">
                                            <i class="fa fa-eye"></i>
                                            </a>

                                        </td>
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

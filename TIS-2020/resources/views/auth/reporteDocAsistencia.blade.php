@extends('layouts.appjefe')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Reporte de Asistencia</h2></div>
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
               <div class="text-center"> <h2>Registro de Reporte de Asistencia Semanal</h2> </div>
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
                                        <th scope="col">Materia</th>
                                        <th scope="col">Hora inicio</th>
                                        <th scope="col">Hora fin</th>
                                        <th scope="col" >Contenido de Clase</th>
                                        <th scope="col">Observaciones</th>
                                        <th scope="col">Asistencia</th>
                                       
                                        <th scope="col" width="160px">acciones</th>
                                    </tr>
                                    </thead>
                                    <!--codigo para leer base de datos tabla-->
                                     <tbody>
                                     <!------------------------------------------->
                                     <?php 
                                        include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
                                        $query=pg_query($conexion,"SELECT formulario_avances.observaciones, formulario_avances.contenido, 
                                        materias.nombre AS nombre_materia, usuarios.nombre AS nombre_docente
                                        FROM formulario_avances
                                        JOIN materias ON formulario_avances.codigo_materia = materias.codigo_materia
                                        JOIN usuarios ON formulario_avances.sis_usuario = usuarios.cod_sis
                                        WHERE usuarios.cargo = 'Docente';");
                                        $n = 0;
                                        
                                    ?>
                                    
                                        <!--<tr class="">-->
                                        <?php 
                                            while($datos=pg_fetch_array($query)){
                                                $n++;
                                                echo "<tr>";
                                                echo "<td></td>";
                                                echo "<td>".$datos['nombre_docente']."</td>";
                                                echo "<td>".$datos['nombre_materia']."</td>";
                                                echo "<td></td>";
                                                echo "<td></td>";
                                                echo "<td>".$datos['contenido']."</td>";
                                                echo "<td>".$datos['observaciones']."</td>";
                                                echo "<td>";
                                        ?>
                                        <!--<tr class="">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>-->
                                        
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">SI</label>
                                            </div>
                                        </td>
                                        <td >
                                            <a href="#" class="show-modal btn btn-info btn-sm" data-id="">
                                            <i class="fa fa-eye"></i>
                                            </a>
                                            
                                        </td>
                                        </tr>
                                        <?php 
                                            }
                                        ?>
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

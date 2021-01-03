@extends('layouts.appAdmin')

@if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('message')}}
        </div>
@endif
@if(Session::has('message0'))
        <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{Session::get('message0')}}
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
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Registrar Materias</h2></div>
                <br>
                <div class="panel-body">
                        <div class="row">
                            <button style="margin: 10px" type="button" class="btn btn-primary create-modal" data-toggle="modal" data-target="#crearMateria">
                                Registrar Materia   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </button>
                            <button style="margin: 10px" type="button" class="btn btn-primary create-modal" data-toggle="modal" data-target="#crearGrupo">
                                Registrar Grupo   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </button>
                        </div>

                <form class="form-horizontal" method="POST" action="{{ route('admin.materias') }}">
                        {{ csrf_field() }}
                         <!------------------------------ ---------------------------->
                        <!-- Modal crear Materia-->
                        <div class="modal fade" id="crearMateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Registrar Materia</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="nombre" class="col-md-4 control-label">Nombre Materia</label>

                                            <div class="col-md-12">
                                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>
                                            </div>
                                            <label for="codigo_materia" class="col-md-4 control-label">Codigo Materia</label>
                                            <div class="col-md-12">
                                                <input id="codigo_materia" type="text" class="form-control" name="codigo_materia" value="{{ old('codigo_materia') }}" pattern="[0-9]{1,15}" 
                                                        title="Solo se admiten numeros" required>
                                            </div>
                                            
                                            <label for="id_departamento" class="col-md-4 control-label">Departamento</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="id_departamento" name="id_departamento" required>
                                                    <option value="">Seleccione el departamento al que pertenece la materia</option>  
                                                        <?php
                                                            //$usuario = Auth::user()->;
                                                            include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
                                                            $query=pg_query($conexion,"SELECT departamentos.id, departamentos.departamento FROM departamentos;");
                                                            while($datos = pg_fetch_array($query)){
                                                        ?>
                                                        <option value="<?php echo $datos['id']?>"> <?php echo $datos['departamento']?> </option>
                                                        <?php
                                                            }    
                                                        ?>  
                                                </select>
                                            </div>
                                            
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success"  id="add1">Registrar</button>
                                        </div>
                                        
                                    </div>
                                </div>
                        </div>
                </form>
                <form class="form-horizontal" method="POST" action="{{ route('admin.grupo') }}">
                        {{ csrf_field() }}
                         <!------------------------------ ---------------------------->
                        <!-- Modal crear grupo-->
                        <div class="modal fade" id="crearGrupo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Registrar Grupo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="numero" class="col-md-4 control-label">Numero de Grupo</label>

                                            <div class="col-md-12">
                                                <input id="numero" type="text" class="form-control" name="numero" value="{{ old('numero') }}" pattern="[0-9]{1,2}" 
                                                        title="Solo se admiten numeros" required autofocus>
                                            </div>
                                                                                        
                                            <!--<label for="cargo" class="col-md-4 control-label">Departamento</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="id_departamento" name="id_departamento" required>
                                                    <option value="">Seleccione el departamento al que pertenece la materia</option>  
                                                        <?php
                                                            /*include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
                                                            $query=pg_query($conexion,"SELECT departamentos.id, departamentos.departamento FROM departamentos;");
                                                            while($datos = pg_fetch_array($query)){*/
                                                        ?>
                                                        <option value="<?php //echo $datos['id']?>"> <?php //echo $datos['departamento']?> </option>
                                                        <?php
                                                            //}    
                                                        ?>  
                                                </select>
                                            </div>-->
                                            <label for="cargo" class="col-md-4 control-label">Materia</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="id_materia" name="id_materia" required>
                                                    <option value="">Seleccione la materia</option>  
                                                        <?php
                                                            $query=pg_query($conexion,"SELECT materias.id, materias.nombre 
                                                                                        FROM materias;");
                                                            while($datos = pg_fetch_array($query)){
                                                        ?>
                                                        <option value="<?php echo $datos['id']?>"> <?php echo $datos['nombre']?> </option>
                                                        <?php
                                                            }    
                                                        ?>  
                                                </select>
                                            </div>
                                            <label for="cargo" class="col-md-4 control-label">Docente</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="sis_docente" name="sis_docente" required>
                                                    <option value="">Asigne un Docente</option>  
                                                        <?php
                                                            $query=pg_query($conexion,"SELECT usuarios.cod_sis, usuarios.nombre 
                                                                                        FROM usuarios WHERE cargo = 'Docente' OR cargo = 'Jefe de Departamento';");
                                                            while($datos = pg_fetch_array($query)){
                                                        ?>
                                                        <option value="<?php echo $datos['cod_sis']?>"> <?php echo $datos['nombre']?> </option>
                                                        <?php
                                                            }    
                                                        ?>  
                                                </select>
                                            </div>
                                            <label for="cargo" class="col-md-4 control-label">Auxiliar</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="sis_aux" name="sis_aux">
                                                    <option value="">Asigne un Auxiliar de ser necesario</option>  
                                                        <?php
                                                            $query=pg_query($conexion,"SELECT usuarios.cod_sis, usuarios.nombre 
                                                                                        FROM usuarios WHERE cargo = 'Auxiliar Docente';");
                                                            while($datos = pg_fetch_array($query)){
                                                        ?>
                                                        <option value="<?php echo $datos['cod_sis']?>"> <?php echo $datos['nombre']?> </option>
                                                        <?php
                                                            }    
                                                        ?>  
                                                </select>
                                            </div>
                                            <label for="cargo" class="col-md-4 control-label">Horario</label>
                                            <br><!----------------LUNES---------------------->
                                            <label><input type="checkbox" id="checkboxLunes" value="checkboxLunes" onclick="myFunctionLunes()"> Lunes</label>
                                            <select class="col-md-8" id="horarioLunes" name="horarioLunes" required>
                                                    <option value="">seleccione horario</option>  
                                                    <option value="6:45-8:15">6:45-8:15</option>  
                                                    <option value="8:15-9:45">8:15-9:45</option>  
                                                    <option value="9:45-11:15">9:45-11:15</option>  
                                                    <option value="11:15-12:45">11:15-12:45</option>  
                                                    <option value="12:45-14:15">12:45-14:15</option>  
                                                    <option value="14:15-15:45">14:15-15:45</option>  
                                                    <option value="15:45-17:15">15:45-17:15</option>  
                                                    <option value="17:15-18:45">17:15-18:45</option>
                                                    <option value="18:45-20:15">18:45-20:15</option>
                                                    <option value="20:15-21:45">20:15-21:45</option>
                                            </select><br>
                                            <script type="text/javascript">
                                            $("#horarioLunes").hide().prop('required',false);
                                                function myFunctionLunes() {
                                                    // Get the checkbox
                                                    var checkBox = document.getElementById("checkboxLunes");
                                                    // Get the output text
                                                    var text = document.getElementById("horarioLunes");

                                                    // If the checkbox is checked, display the output text
                                                    if (checkBox.checked == true){
                                                        $("#horarioLunes").show();
                                                    } else {
                                                        $("#horarioLunes").hide().prop('required',false);
                                                    }
                                                    }
                                            </script><!----------------MARTES---------------------->
                                            <label><input type="checkbox" id="checkboxMartes" value="checkboxMartes" onclick="myFunctionMartes()"> Martes</label>
                                            <select class="col-md-8" id="horarioMartes" name="horarioMartes" required>
                                                    <option value="">seleccione horario</option>  
                                                    <option value="6:45-8_15">6:45-8:15</option>  
                                                    <option value="8:15-9:45">8:15-9:45</option>  
                                                    <option value="9:45-11:15">9:45-11:15</option>  
                                                    <option value="11:15-12:45">11:15-12:45</option>  
                                                    <option value="12:45-14:15">12:45-14:15</option>  
                                                    <option value="14:15-15:45">14:15-15:45</option>  
                                                    <option value="15:45-17:15">15:45-17:15</option>  
                                                    <option value="17:15-18:45">17:15-18:45</option>
                                                    <option value="18:45-20:15">18:45-20:15</option>
                                                    <option value="20:15-21:45">20:15-21:45</option>
                                            </select><br>
                                            <script type="text/javascript">
                                            $("#horarioMartes").hide().prop('required',false);
                                                function myFunctionMartes() {
                                                    // Get the checkbox
                                                    var checkBox = document.getElementById("checkboxMartes");
                                                    // Get the output text
                                                    var text = document.getElementById("horarioMartes");

                                                    // If the checkbox is checked, display the output text
                                                    if (checkBox.checked == true){
                                                        $("#horarioMartes").show();
                                                    } else {
                                                        $("#horarioMartes").hide().prop('required',false);
                                                    }
                                                    }
                                            </script><!----------------MIERCOLES---------------------->
                                            <label><input type="checkbox" id="checkboxMiercoles" value="checkboxMiercoles" onclick="myFunctionMiercoles()"> Miercoles</label>
                                            <select class="col-md-8" id="horarioMiercoles" name="horarioMiercoles" required>
                                                    <option value="">seleccione horario</option>  
                                                    <option value="6:45-8_15">6:45-8:15</option>  
                                                    <option value="8:15-9:45">8:15-9:45</option>  
                                                    <option value="9:45-11:15">9:45-11:15</option>  
                                                    <option value="11:15-12:45">11:15-12:45</option>  
                                                    <option value="12:45-14:15">12:45-14:15</option>  
                                                    <option value="14:15-15:45">14:15-15:45</option>  
                                                    <option value="15:45-17:15">15:45-17:15</option>  
                                                    <option value="17:15-18:45">17:15-18:45</option>
                                                    <option value="18:45-20:15">18:45-20:15</option>
                                                    <option value="20:15-21:45">20:15-21:45</option>
                                            </select><br>
                                            <script type="text/javascript">
                                            $("#horarioMiercoles").hide().prop('required',false);
                                                function myFunctionMiercoles() {
                                                    // Get the checkbox
                                                    var checkBox = document.getElementById("checkboxMiercoles");
                                                    // Get the output text
                                                    var text = document.getElementById("horarioMiercoles");

                                                    // If the checkbox is checked, display the output text
                                                    if (checkBox.checked == true){
                                                        $("#horarioMiercoles").show();
                                                    } else {
                                                        $("#horarioMiercoles").hide().prop('required',false);
                                                    }
                                                    }
                                            </script><!----------------JUEVES    ---------------------->
                                            <label><input type="checkbox" id="checkboxJueves" value="checkboxJueves" onclick="myFunctionJueves()"> Jueves</label>
                                            <select class="col-md-8" id="horarioJueves" name="horarioJueves" required>
                                                    <option value="">seleccione horario</option>  
                                                    <option value="6:45-8_15">6:45-8:15</option>  
                                                    <option value="8:15-9:45">8:15-9:45</option>  
                                                    <option value="9:45-11:15">9:45-11:15</option>  
                                                    <option value="11:15-12:45">11:15-12:45</option>  
                                                    <option value="12:45-14:15">12:45-14:15</option>  
                                                    <option value="14:15-15:45">14:15-15:45</option>  
                                                    <option value="15:45-17:15">15:45-17:15</option>  
                                                    <option value="17:15-18:45">17:15-18:45</option>
                                                    <option value="18:45-20:15">18:45-20:15</option>
                                                    <option value="20:15-21:45">20:15-21:45</option>
                                            </select><br>
                                            <script type="text/javascript">
                                            $("#horarioJueves").hide().prop('required',false);
                                                function myFunctionJueves() {
                                                    // Get the checkbox
                                                    var checkBox = document.getElementById("checkboxJueves");
                                                    // Get the output text
                                                    var text = document.getElementById("horarioJueves");

                                                    // If the checkbox is checked, display the output text
                                                    if (checkBox.checked == true){
                                                        $("#horarioJueves").show();
                                                    } else {
                                                        $("#horarioJueves").hide().prop('required',false);
                                                    }
                                                    }
                                            </script><!----------------VIERNES---------------------->
                                            <label><input type="checkbox" id="checkboxViernes" value="checkboxViernes" onclick="myFunctionViernes()"> Viernes</label>
                                            <select class="col-md-8" id="horarioViernes" name="horarioViernes" required>
                                                    <option value="">seleccione horario</option>  
                                                    <option value="6:45-8_15">6:45-8:15</option>  
                                                    <option value="8:15-9:45">8:15-9:45</option>  
                                                    <option value="9:45-11:15">9:45-11:15</option>  
                                                    <option value="11:15-12:45">11:15-12:45</option>  
                                                    <option value="12:45-14:15">12:45-14:15</option>  
                                                    <option value="14:15-15:45">14:15-15:45</option>  
                                                    <option value="15:45-17:15">15:45-17:15</option>  
                                                    <option value="17:15-18:45">17:15-18:45</option>
                                                    <option value="18:45-20:15">18:45-20:15</option>
                                                    <option value="20:15-21:45">20:15-21:45</option>
                                            </select><br>
                                            <script type="text/javascript">
                                            $("#horarioViernes").hide().prop('required',false);
                                                function myFunctionViernes() {
                                                    // Get the checkbox
                                                    var checkBox = document.getElementById("checkboxViernes");
                                                    // Get the output text
                                                    var text = document.getElementById("horarioViernes");

                                                    // If the checkbox is checked, display the output text
                                                    if (checkBox.checked == true){
                                                        $("#horarioViernes").show();
                                                    } else {
                                                        $("#horarioViernes").hide().prop('required',false);
                                                    }
                                                    }
                                            </script><!----------------SABADO---------------------->
                                            <label><input type="checkbox" id="checkboxSabado" value="checkboxSabado" onclick="myFunctionSabado()"> Sabado</label>
                                            <select class="col-md-8" id="horarioSabado" name="horarioSabado" required>
                                                    <option value="">seleccione horario</option>  
                                                    <option value="6:45-8_15">6:45-8:15</option>  
                                                    <option value="8:15-9:45">8:15-9:45</option>  
                                                    <option value="9:45-11:15">9:45-11:15</option>  
                                                    <option value="11:15-12:45">11:15-12:45</option>  
                                            </select><br>
                                            <script type="text/javascript">
                                            $("#horarioSabado").hide().prop('required',false);
                                                function myFunctionSabado() {
                                                    // Get the checkbox
                                                    var checkBox = document.getElementById("checkboxSabado");
                                                    // Get the output text
                                                    var text = document.getElementById("horarioSabado");

                                                    // If the checkbox is checked, display the output text
                                                    if (checkBox.checked == true){
                                                        $("#horarioSabado").show();
                                                    } else {
                                                        $("#horarioSabado").hide().prop('required',false);
                                                    }
                                                    }
                                            </script><!----------------SABADO---------------------->
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success"  id="add2">Registrar</button>
                                        </div>
                                        
                                    </div>
                                </div>
                        </div>
                </form>


                    <!------------------------------ ---------------------------->
                          <!-- tabla de registro -->
                          <h5 class="title" id="title">Materias</h5>
                            <div class="row">
                                <div class="table table-responsive">
                                <br>
                                    <table class="table table-bordered" id="table">
                                    <tr>
                                        <th width="80px">No</th>
                                        <th>Materia</th>
                                        <th>Codigo materia</th>
                                        <th>Facultad</th>
                                        <th>acciones</th>

                                    </tr>
                                    <!--codigo para leer base de datos tabla-->
                                    <?php 
                                        include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
                                        $query=pg_query($conexion,"SELECT materias.nombre, materias.codigo_materia, departamentos.departamento
                                                         FROM materias JOIN departamentos ON materias.id_departamento = departamentos.id;");
                                        $n = 0;
                                    ?>
                                        <!--<tr class="">-->
                                        <?php 
                                            while($datos=pg_fetch_array($query)){
                                                $n++;
                                                echo "<tr>";
                                                echo "<td>".$n."</td>";
                                                echo "<td>".$datos['nombre']."</td>";
                                                echo "<td>".$datos['codigo_materia']."</td>";
                                                echo "<td>".$datos['departamento']."</td>";
                                        ?>
                                        <!--<tr class="">
                                        <td></td>
                                        <td></td>
                                        <td></td>-->
                                        <td>
                                            <a href="#" class="show-modal btn btn-info btn-sm" data-id="">
                                            <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                            </a>
                                            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                            </a>
                                        </td>
                                        </tr>
                                        <?php 
                                            }
                                        ?>

                                    </table>
                                </div>
                            </div>
                            <h5 class="title" id="title">Grupos</h5>
                            <div class="row">
                                <div class="table table-responsive">
                                <br>
                                    <table class="table table-bordered" id="table">
                                    <tr>
                                        <th width="80px">No</th>
                                        <th>Numero de Grupo</th>
                                        <th>Materia</th>
                                        <th>Codigo Materia</th>
                                        <th>Departamento</th>
                                        <th>Docente</th>
                                        <th>Acciones</th>

                                    </tr>
                                    <!--codigo para leer base de datos tabla-->
                                    <?php 
                                        include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
                                        $query1=pg_query($conexion,"SELECT grupos.numero, materias.nombre, materias.codigo_materia, 
                                        departamentos.departamento, usuarios.nombre AS nombredoc 
                                        FROM grupos
                                        JOIN materias ON grupos.id_materia = materias.id 
                                        JOIN usuarios ON grupos.sis_usuario = usuarios.cod_sis
                                        JOIN departamentos ON materias.id_departamento = departamentos.id;");
                                        $n1 = 0;
                                    ?>
                                        <!--<tr class="">-->
                                        <?php 
                                            while($datos=pg_fetch_array($query1)){
                                                $n1++;
                                                echo "<tr>";
                                                echo "<td>".$n1."</td>";
                                                echo "<td>".$datos['numero']."</td>";
                                                echo "<td>".$datos['nombre']."</td>";
                                                echo "<td>".$datos['codigo_materia']."</td>";
                                                echo "<td>".$datos['departamento']."</td>";
                                                echo "<td>".$datos['nombredoc']."</td>";
                                        ?>
                                        <!--<tr class="">
                                        <td></td>
                                        <td></td>
                                        <td></td>-->
                                        <td>
                                            <a href="#" class="show-modal btn btn-info btn-sm" data-id="">
                                            <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                            </a>
                                            <a href="#" class="delete-modal btn btn-danger btn-sm" data-id="" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                            </a>
                                        </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>

                                    </table>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
                <div class="panel-heading"><h2>Registrar Usuarios</h2></div>
                <br>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.usuarios') }}">
                        {{ csrf_field() }}
                         <!------------------------------ ---------------------------->
                        <div class="row">
                            <button style="margin: 10px" type="button" class="btn btn-primary create-modal" data-toggle="modal" data-target="#crearUsuario">
                                Registrar Usuario   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Modal crear Usuario-->
                        <div class="modal fade" id="crearUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Registrar Usuario</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!--<div class="modal-body">
                                            <label for="inputCity">Nombre de la Facultad</label>
                                            <input type="text" class="form-control" id="facultad">
                                        </div>-->
                                        <div class="modal-body">
                                            <label for="name" class="col-md-4 control-label">Nombre Completo</label>

                                            <div class="col-md-12">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                            </div>
                                            <label for="cod_sis" class="col-md-4 control-label">Codigo SIS</label>
                                            <div class="col-md-12">
                                                <input id="cod_sis" type="text" class="form-control" name="cod_sis" value="{{ old('cod_sis') }}" pattern="[0-9]{1,11}" 
                                                        title="Solo se admiten numeros" required>
                                            </div>
                                            
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-12">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                            </div>
                                            
                                            <label for="cargo" class="col-md-4 control-label">Cargo</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="cargo" name="cargo" value="{{ old('cargo') }}" onChange="mostrar(this.value);" required>
                                                    <option value="">Seleccione un cargo</option>
                                                    <option value="Administrador">Administrador</option>
                                                    <option value="Docente">Docente</option>
                                                    <option value="Jefe de Departamento">Jefe de Departamento</option>
                                                    <option value="Secretaria">Secretaria</option>
                                                    <option value="Auxiliar Docente">Auxiliar Docente</option>
                                                    <option value="Auxiliar Laboratorio">Auxiliar Laboratorio</option>
                                                </select>
                                            </div>
                                            
                                            <label for="name" id="departamentoLabel" class="col-md-4 control-label">Departamento</label>
                                            <div class="col-md-12">
                                                <select class="form-control" id="departamento" name="departamento">
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
                                            <script type="text/javascript">
                                                $("#departamentoLabel").hide().prop('required',false);
                                                $("#departamento").hide().prop('required',false);
                                                //$("#departamento").hide();
                                                //$("#departamentoLabel").hide();
                                                function mostrar(id) {
                                                    if (id == "Secretaria" || id == "Jefe de Departamento") {
                                                        $("#departamento").show();
                                                        $("#departamentoLabel").show();
                                                    }else{
                                                        $("#departamento").hide();
                                                        $("#departamentoLabel").hide();
                                                    }
                                                }
                                            </script>

                                            <label for="ci" class="col-md-4 control-label"> Carnet de Identidad </label>
                                            <div class="col-md-12">
                                                <input id="ci" type="text" class="form-control" name="ci" value="{{ old('ci') }}" required>
                                            </div>
                                            
                                            <label for="telefono" class="col-md-4 control-label">Telefono</label>
                                            <div class="col-md-12">
                                                <input id="telefono" type="text" class="form-control" name="telefono" pattern="[0-9]{1,9}" 
                                                title="Solo se admiten numeros" required>
                                            </div>
                                            
                                            <label for="password" class="col-md-4 control-label">contraseña</label>
                                            <div class="col-md-12">
                                                <input id="password" type="password" class="form-control" name="password" required>
                                            </div>
                                            
                                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                            <div class="col-md-12">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success"  id="add">Registrar</button>
                                        </div>
                                        
                                    </div>
                                </div>
                        </div>
                    
                          <!------------------------------ ---------------------------->
                    </form>
                    <!------------------------------ ---------------------------->
                          <!-- tabla de registro -->

                            <div class="row">
                                    <?php 
                                        include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
                                        $query=pg_query($conexion,"SELECT * FROM usuarios;");
                                        $n = 1;
                                    ?>

                                <div class="table table-responsive">
                                <br>
                                    <table class="table table-bordered" id="table">
                                    <tr>
                                        <th width="80px">No</th>
                                        <th>Codigo SIS</th>
                                        <th>Nombre Completo</th>
                                        <th>Cargo</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>CI</th>
                                        <th>Acciones</th>

                                    </tr>
                                    <!--codigo para leer base de datos tabla-->
                                    <?php 
                                        include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
                                        $query=pg_query($conexion,"SELECT * FROM usuarios;");
                                        $n = 0;
                                        
                                    ?>
                                        <!--<tr class="">-->
                                        <?php 
                                            while($datos=pg_fetch_array($query)){
                                                $n++;
                                                echo "<tr>";
                                                echo "<td>".$n."</td>";
                                                echo "<td>".$datos['cod_sis']."</td>";
                                                echo "<td>".$datos['nombre']."</td>";
                                                echo "<td>".$datos['cargo']."</td>";
                                                echo "<td>".$datos['ci']."</td>";
                                                echo "<td>".$datos['email']."</td>";
                                                echo "<td>".$datos['telefono']."</td>";
                                                echo "<td>";
                                        ?>
                                        
                                        <!--<td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>-->
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
                            
                        
                    <!------------------------------------------------------------>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

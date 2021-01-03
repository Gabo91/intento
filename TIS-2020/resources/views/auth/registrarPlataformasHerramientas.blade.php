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
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Registrar Herraminetas y Plataformas</h2></div>
                <br>
                <div class="panel-body">
                    
                        <div class="row">

                            <button style="margin: 10px" type="button" class="btn btn-primary create-modal" data-toggle="modal" data-target="#creearHerramienta">
                                Crear Herramienta   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </button>

                            <button style="margin: 10px" type="button" class="btn btn-primary create-modal" data-toggle="modal" data-target="#crearPlataforma">
                                Crear Plataforma   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </button>
                            </div>




                            <!-- Modal crear Herramienta-->
                            <form  method="POST" action="{{url('addHerramienta')}}">
                                    {{ csrf_field() }}
                                <div class="modal fade" id="creearHerramienta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Registrar Herramienta</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <!--entrada Modal-->
                                        <div class="modal-body">
                                            <label for="facultad">Nombre de la Herramienta</label>
                                            <input type="text" class="form-control" id="nombre_herramienta" name="nombre_herramienta">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-success"  id="add">registrar</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                             </form>

{{-- Modal Form Edit and Delete Post --}}
<div id="myModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal">

          <div class="form-group">
            <label class="control-label col-sm-2"for="id">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fid" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="title">Title</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="t">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2"for="body">Body</label>
            <div class="col-sm-10">
            <textarea type="name" class="form-control" id="b"></textarea>
            </div>
          </div>
        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
          Are You sure want to delete <span class="title"></span>?
          <span class="hidden id"></span>
        </div>

      </div>
      <div class="modal-footer">

        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>

        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>close
        </button>

      </div>
    </div>
  </div>
</div>

                                <!-- Modal crear Plataforma-->
                                <form  method="POST" action="{{url('addPlataforma')}}">
                                 {{ csrf_field() }}
                                <div class="modal fade" id="crearPlataforma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Registro de Plataformas</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <label for="">Nombre de la Plataforma</label>
                                        <input type="text" class="form-control" id="nombre_plataforma" name="nombre_plataforma">


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-success"  id="add">registrar</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                                <!-- tabla de registro -->
                                <br>
                                <h5 class="title" id="title">Lista de Herramientas Habilitadas</h5>
                                <div class="row">
                                <div class="table table-responsive">
                                <br>
                                    <table class="table table-bordered" id="table">
                                    <tr>
                                        <th width="80px">No</th>
                                        <th>Herramienta</th>
                                        <th>acciones</th>

                                    </tr>
                         <!--codigo para leer base de datos tabla Herramientas-->                               
                                    <?php 
                                        //function pasar($var1, $var2){
                                        //    FormularioDocente::create($request->all());
                                        //}
                                        
                                        include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
                                        $query=pg_query($conexion,"SELECT herramientas.nombre_herramienta FROM herramientas;"); 
                                                                    //INNER JOIN departamentos ON facultades.id = departamentos.id_facultad");
                                        //$datos = pg_fetch_array($query);
                                        //$facultad = $datos['facultad'];
                                        //$departamento = $datos['departamento'];
                                        $n = 0;      
                                        while($mostrar=pg_fetch_array($query)){
                                            $n++;
                                            echo "<td>".$n."</td>";
                                            echo "<td>".$mostrar['nombre_herramienta']."</td>";
                                        ?>
                                            <td>
                                                
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


                <!--Crear Plataformas-->
                            </div>
                            <br>
                                <h5 class="title" id="title">Lista de Plataformas Habilitadas</h5>
                                <div class="row">
                                <div class="table table-responsive">
                                <br>
                                    <table class="table table-bordered" id="table">
                                    <tr>
                                        <th width="80px">No</th>
                                        <th>Plataformas</th>
                                        <th>acciones</th>

                                    </tr>
                                    <!--codigo para leer base de datos tabla-->
                                    <?php 
                                        //function pasar($var1, $var2){
                                        //    FormularioDocente::create($request->all());
                                        //}
                                        
                                        include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
                                        $query=pg_query($conexion,"SELECT plataformas.nombre_plataforma FROM plataformas;");

                                        $n2 = 0;      
                                        while($mostrar=pg_fetch_array($query)){
                                            $n2++;
                                            echo "<td>".$n2."</td>";
                                            echo "<td>".$mostrar['nombre_plataforma']."</td>";
                                            
                                        ?>                                        
                                            <td>
                                                
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
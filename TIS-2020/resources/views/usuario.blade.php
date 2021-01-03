@extends('layouts.appHome')
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
                <div class="panel-heading">Bienvenido {{ Auth::user()->nombre }}</div>
                <div class="panel-heading">Seleccione la materia de la que quiere llenar un reporte</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div class="panel-heading">
                    <form action="{{ url('post') }}" method="GET"> <!---->
                        {{ csrf_field() }}
                        <div>
                            <p id='codigoSis' name='codigoSis'>Codigo SIS:  {{ Auth::user()->cod_sis }} </p>
                            <input type="hidden" id="codigoSis" name="codigoSis" value="{{ Auth::user()->cod_sis }}">
                            <?php $cargo = "null";?>                           
                            <select class="form-control" id="materia" name="materia" required>
                                <option value="">Seleccione materia</option>  
                                    <?php
                                        //$usuario = Auth::user()->;
                                        $codSis = Auth::user()->cod_sis;
                                        include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
                                        //$conexion = pg_connect("host=localhost dbname=talos_db user=postgres password=1234")
                                        //or die ('No se ha podido conectar: '.pg_last_error());
                                        $query=pg_query($conexion,"SELECT materias.nombre, usuarios.cargo FROM materias 
                                                                    INNER JOIN grupos ON materias.id = grupos.id_materia 
                                                                    INNER JOIN usuarios ON usuarios.cod_sis = grupos.sis_usuario
                                                                    WHERE usuarios.cod_sis = '".$codSis."';");
                                        while($datos = pg_fetch_array($query)){
                                    ?>
                                    <option value="<?php echo $datos['nombre']?>"> <?php echo $datos['nombre']?> </option>
                                    <?php
                                        $cargo = $datos['cargo'];
                                        }    
                                    ?>  
                            </select>
                            <input type="hidden" id="cargo" name="cargo" value="<?php echo $cargo?>">
                        </div>
                        <br>
                        <div>
                            <button class="btn btn-success mx-5" id="iniciar" type="submit">Iniciar</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

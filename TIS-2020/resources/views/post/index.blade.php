
{{-- calling layouts \ app.blade.php --}}
@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <?php
      //function pasar($var1, $var2){
      //    FormularioDocente::create($request->all());
      //}
      $codigoSis = $_GET['codigoSis'];
      $materia = $_GET['materia'];
      include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
      //require_once('../conexion.php');
      //$conexion = pg_connect("host=localhost dbname=talos_db user=postgres password=1234")or die ('No se ha podido conectar: '.pg_last_error());
      $query=pg_query($conexion,"SELECT facultades.facultad, departamentos.departamento, materias.nombre, grupos.numero, usuarios.nombre FROM facultades
                                  INNER JOIN departamentos ON facultades.id = departamentos.id_facultad
                                  INNER JOIN materias ON departamentos.id = materias.id_departamento
                                  INNER JOIN grupos ON materias.id = grupos.id_materia
                                  INNER JOIN usuarios ON grupos.sis_usuario = usuarios.cod_sis
                                  WHERE materias.nombre = '".$materia."' AND usuarios.cod_sis = '".$codigoSis."';");
      $datos = pg_fetch_array($query);
      $facultad = $datos['facultad'];
      $departamento = $datos['departamento'];
      $docente =$datos['nombre'];
      $grupo =$datos['numero'];

    ?>
    <br>
  <h1 class="text-center">Formulario de Control de Avance </h1>
  <br>
  <div class="container">
      <div class="card">
        <h5 class="card-header">Universidad Mayor de San Simon</h5>
        <div class="card-body">
          <h5 class="card-title">Facultad: <?php echo $facultad?></h5>
          <br>
          <h5 class="card-title">Departamento: <?php echo $departamento?></h5>
          <br>
          <h5 class="card-title">Docente: <?php echo $docente?></h5>
          <br>
          <h5 class="card-title">Codigo SIS: <?php echo $codigoSis?></h5>
          <br>
          <h5 class="card-title">Materia: <?php echo $materia?></h5>
          <br>
          <h5 class="card-title">Grupo: <?php echo $grupo?></h5>
          <br>
          <!--<input type="date" id="bday" name="bday" step="7">-->
        </div>
      </div>
  </div>

<!--------------------------------------->
<!--<form method="POST" action="{{url('addFormulario')}}"  >-->
<form method="POST" action="{{url('addFormulario')}}"  >
    {{ csrf_field() }}
    <?php
        //$codigoSis = $_GET['codigoSis'];
        $query2=pg_query($conexion,"SELECT materias.codigo_materia, usuarios.cod_sis FROM materias
                                  INNER JOIN grupos ON materias.id = grupos.id_materia
                                  INNER JOIN usuarios ON grupos.sis_usuario = usuarios.cod_sis
                                  WHERE materias.nombre = '".$materia."';");
        $datos2 = pg_fetch_array($query2);
        $codMateria = $datos2['codigo_materia'];
        //$sis_usuario = $datos2['cod_sis'];
        //$sis_usuario = Auth::user()->cod_sis;
    ?>

        <input type="hidden" id="codigo_materia" name="codigo_materia" value="<?php echo $codMateria?>">
        <input type="hidden" id="sis_usuario" name="sis_usuario" value="1010">

          <!--tipo de clase-->
          <div >
            <label>Tipo de Clase:</label>
              <select name="tipo_clase" id="tipo_clase" class="selectpicker" onChange="mostrar(this.value);" >
                <option value="">Seleccione</option>
                <option value="normal">Normal</option>
                <option value="reposicion">reposicion</option>
              </select>
          </div>
          <script type="text/javascript">
              function mostrar(id) {
                    if (id == "normal") {
                        $("#modalidad").show();
                        $("#reposicion").hide();
                        $("#dia_clase").show();
                        $("#dia_reposicion").hide();
                        $("#plataformas").show();
                        $("#herramientas").show();
                        $("#contenido").show();
                        $("#observaciones").show();
                        //$("#url").show();
                        $("#subir_contenido").hide();
                        $("#add").show();
                    }
                    if (id == "reposicion") {
                        $("#modalidad").show();
                        $("#reposicion").show();
                        $("#dia_clase").hide();
                        $("#dia_reposicion").show();
                        $("#plataformas").show();
                        $("#herramientas").show();
                        $("#contenido").show();
                        $("#observaciones").show();
                        //$("#url").show();
                        $("#subir_contenido").hide();
                        $("#add").show();
                    }
                }
            </script>




<br>
          <!--Modalidad-->
          <div class="modalidad" id="modalidad" style="display: none;">
            <label>Modalidad:</label>
              <select name="modalidad" id="modalidad" class="selectpicker" onChange="mostrar00(this.value);">
                <option value="virtual">Virtual</option>
                <option value="presencial">Presencial</option>
              </select>
          </div>
          <script type="text/javascript">
            function mostrar00(id) {
                if (id == "virtual") {
                    $("#urlLabel").show().prop('required',false);
                    $("#url").show().prop('required',false);
                }
                if (id == "presencial") {
                    $("#urlLabel").hide().prop('required',false);
                    $("#url").hide().prop('required',false);
                }
          }
        </script>

          <!--fecha de reposicion-->
          <div class ="reposicion" id="reposicion" style="display: none;">
              <label>Fecha en la que se esta reponiendo la clase mm/dd/a:</label>
                <input name="reposicion" id="datepicker" width="276" />
          </div>
              <script>
                $('#datepicker').datepicker({
                   uiLibrary: 'bootstrap4'
                });
              </script>

<br>
          <!--dia de clase-->
          <div class="dia_clase" id="dia_clase" style="display: none;">
            <label>Dia de Clase:</label>
              <select name="dia_clase" id="dia_clase" class="selectpicker"  >
              <?php
                  $query0=pg_query($conexion,"SELECT horarios.dia 
                            FROM horarios
                            JOIN grupos ON horarios.id_grupo = grupos.id
                            JOIN usuarios ON grupos.sis_usuario = usuarios.cod_sis
                            JOIN materias ON grupos.id_materia = materias.id
                            WHERE usuarios.cod_sis = '$codigoSis' AND materias.nombre = '$materia';");
                  while($datos = pg_fetch_array($query0)){
              ?>
                <option value="<?php echo $datos['dia']?> "><?php echo $datos['dia']?></option>
              <?php
                }    
              ?> 
              </select>
          </div>



          <!--dia de remplazo de clase-->
          <div class ="dia_reposicion" id="dia_reposicion" style="display: none;">
              <label>Fecha en la que se debio pasar la clase mm/dd/a:</label>
                <input name="dia_reposicion" id="datepickers" width="276" />
          </div>
              <script>
                $('#datepickers').datepicker({
                   uiLibrary: 'bootstrap4'
                });
              </script>

<br>


          <!--plataformas-->

          <div class="plataformas" id="plataformas" style="display: none;">
            <label>Plataforma de apoyo:</label>
              <select name="plataformas" id="plataformas" class="selectpicker" multiple data-live-search="true">
                 <option value="">Seleccione </option>
                    <?php
                     //$usuario = Auth::user()->;
                       include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
                       $query=pg_query($conexion,"SELECT plataformas.id, plataformas.nombre_plataforma FROM plataformas;");
                      while($datos = pg_fetch_array($query)){
                       ?>
                <option value="<?php echo $datos['nombre_plataforma']?>"> <?php echo $datos['nombre_plataforma']?> </option>
                      <?php
                        }
                      ?>

              </select>
          </div>
          <input id="plataformass" type="hidden" value="defaultold" />
          <script>
            $(document).ready(function() {
                  $('#plataformass').val('default');
                  $('#plataformas').change(function() {
                      $('#plataformass').val($(this).find("option:selected").attr("title"));
                  });
              });
          </script>
 <br>

          <!--herramientas-->
          <div class="herramientas" id="herramientas" style="display: none;">
            <label>Herramientas de apoyo:</label>
              <select name="herramientas" id="herramientas" class="selectpicker" multiple data-live-search="true">
                <option value="">Seleccione </option>
                    <?php
                     //$usuario = Auth::user()->;
                       include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
                       $query=pg_query($conexion,"SELECT herramientas.id, herramientas.nombre_herramienta FROM herramientas;");
                      while($datos = pg_fetch_array($query)){
                       ?>
                <option value="<?php echo $datos['nombre_herramienta']?>"> <?php echo $datos['nombre_herramienta']?> </option>
                      <?php
                        }
                      ?>
              </select>
          </div>
 <br>

            <!--contenido de clase-->
            <div class="contenido" id="contenido" style="display: none;">
              <label class="control-label " for="contenido">Contenido de Clase :</label>

                <textarea class="form-control " id="contenido" name="contenido"
                placeholder="Ingrese una descripcion" required></textarea>
                    <div class="invalid-feedback">
                    Ingrese el avance de materia en el área de texto.
                    </div>
              </div>



            <!--observaciones-->
            <div class="observaciones" id="observaciones" style="display: none;">
              <label class="control-label col-sm-6" for="observaciones">Observaciones :</label>

                <textarea  class="form-control " id="observaciones" name="observaciones"
                placeholder="Ingrese una descripcion" required></textarea>
                <div class="invalid-feedback">
                    Ingrese el avance de materia en el área de texto.
                    </div>
            </div>

             <!--link de la clase-->
            <div class="url" id="url" style="display: none;">
              <label class="control-label col-sm-6" id="urlLabel" name="urlLabel" for="url">Link de la clase :</label>
              <div class="col-sm-auto ">
                <textarea  class="form-control " id="url" name="url"
                placeholder="Ingrese el Link de la clase"></textarea>
              </div>
            </div>

            <!--subir archivo-->
            <div class="form-group subir_archivo" id="subir_archivo" style="display: none;">
               <label for="exampleFormControlFile1">Example file input</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
        <br>
             <div>
              <button class="btn btn-success" type="submit" id="add" style="display: none;">Enviar Reporte</button>
             </div>
             <!----datos extra para formulario----->
    
</form>
        <br>
        <hr />
        <h4>Formularios registrados esta semana</h4>
        <div class="table  table-responsive">
          <br>
            <table class="table table-bordered"  id="table">
                <thead>
                <tr>
                    <th width="80px" scope="col">Nº</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Dia</th>
                    <th scope="col">Modalidad</th>
                    <th scope="col" >Contenido de Clase</th>
                    <th scope="col">Observaciones</th>
                    <!--<th scope="col">Plataformas</th>
                    <th scope="col">Herramientas</th>-->
                    <th scope="col">Url</th>
                </tr>
                </thead>
                <!--codigo para leer base de datos tabla-->
                <tbody>
                    <!------------------------------------------->
                    <?php        
                        $fechaInicio = date("Y-m-d", strtotime("previous monday")); //cambiar estos dias en caso de que se quiera otro dia de la semana
                        $fechaFin = date("Y-m-d", strtotime("next sunday")); //cambiar estos dias en caso de que se quiera otro dia de la semana

                        include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
                        $queryregistros=pg_query($conexion,"SELECT formulario_avances.created_at, formulario_avances.dia_clase, 
                        formulario_avances.contenido, formulario_avances.observaciones, formulario_avances.url, formulario_avances.modalidad,
                        formulario_avances.plataformas, formulario_avances.herramientas
                        FROM formulario_avances
                        WHERE formulario_avances.tipo_clase = 'normal' AND formulario_avances.sis_usuario = '$codigoSis'
                        AND formulario_avances.codigo_materia = '$codMateria' AND formulario_avances.created_at BETWEEN '".$fechaInicio."' AND '".$fechaFin."';");
                        $n = 0;
                                        
                    ?>
                      <!--<tr class="">-->
                    <?php 
                        while($datosRegistrados=pg_fetch_array($queryregistros)){
                        $n++;
                        $fecha = explode(" ", $datosRegistrados['created_at']);
                        echo "<tr>";
                        echo "<td>".$n."</td>";
                        echo "<td>".$fecha[0]."</td>";
                        echo "<td>".$datosRegistrados['dia_clase']."</td>";
                        echo "<td>".$datosRegistrados['modalidad']."</td>";
                        echo "<td>".$datosRegistrados['contenido']."</td>";
                        echo "<td>".$datosRegistrados['observaciones']."</td>";
                        //echo "<td>".$datosRegistrados['plataformas']."</td>";
                        //echo "<td>".$datosRegistrados['herramientas']."</td>";
                        echo "<td>".$datosRegistrados['url']."</td>";
                    ?>
                                        </tr>
                    <?php 
                        }
                    ?>
              </tbody>
            </table>
        </div>

        <br>
        <hr />
        <h4>Formularios de Reposicion</h4>
        <div class="table  table-responsive">
          <br>
            <table class="table table-bordered"  id="table">
                <thead>
                <tr>
                    <th width="60px" scope="col">Nº</th>
                    <th scope="col">Fecha registro formulario</th>
                    <th scope="col">Fecha reposicion</th>
                    <th scope="col">Fecha clase repuesta</th>
                    <th scope="col">Contenido de Clase</th>
                    <th scope="col">Observaciones</th>
                    <!--<th scope="col">Plataformas</th>
                    <th scope="col">Herramientas</th>-->
                    <th scope="col">Url</th>
                </tr>
                </thead>
                <!--codigo para leer base de datos tabla-->
                <tbody>
                    <!------------------------------------------->
                    <?php 
                        $fechaInicio = date("Y-m-d", strtotime("previous monday")); //cambiar estos dias en caso de que se quiera otro dia de la semana
                        $fechaFin = date("Y-m-d", strtotime("next sunday")); //cambiar estos dias en caso de que se quiera otro dia de la semana

                        include($_SERVER['DOCUMENT_ROOT'].'../../resources/views/conexion.php');
                        $queryregistros2=pg_query($conexion,"SELECT formulario_avances.created_at, formulario_avances.reposicion, formulario_avances.dia_reposicion,
                        formulario_avances.contenido, formulario_avances.observaciones, formulario_avances.url
                        FROM formulario_avances
                        WHERE formulario_avances.tipo_clase = 'reposicion' AND formulario_avances.sis_usuario = '$codigoSis'
                        AND formulario_avances.codigo_materia = '$codMateria' AND formulario_avances.created_at BETWEEN '".$fechaInicio."' AND '".$fechaFin."';");
                        $n1 = 0;                
                    ?>
                      <!--<tr class="">-->
                    <?php 
                        while($datosRegistrados2=pg_fetch_array($queryregistros2)){
                        $n1++;
                        $fecha = explode(" ", $datosRegistrados2['created_at']);
                        echo "<tr>";
                        echo "<td>".$n1."</td>";
                        echo "<td>".$fecha[0]."</td>";
                        echo "<td>".$datosRegistrados2['reposicion']."</td>";
                        echo "<td>".$datosRegistrados2['dia_reposicion']."</td>";
                        echo "<td>".$datosRegistrados2['contenido']."</td>";
                        echo "<td>".$datosRegistrados2['observaciones']."</td>";
                        //echo "<td>".$datosRegistrados['plataformas']."</td>";
                        //echo "<td>".$datosRegistrados['herramientas']."</td>";
                        echo "<td>".$datosRegistrados2['url']."</td>";
                    ?>
                                        </tr>
                    <?php 
                        } 
                    ?>
              </tbody>
            </table>
        </div>


@endsection

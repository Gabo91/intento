<?php
$conexion = pg_connect("host=localhost dbname=talos_db user=postgres password=1234")or die ('No se ha podido conectar: '.pg_last_error());
?>
<?php
session_start();
$_SESSION['sesion'] = array();

require_once('Conexion.php');
$sql_r = mysqli_query($conexion, "SELECT privilegio FROM acceso WHERE acceso.correo = '$correo'");
foreach($sql_r as $i) {
  $privilegio_query = $i['privilegio'];
}

$_SESSION['sesion'][0] = $correo;
$_SESSION['sesion'][1] = $privilegio_query;
?>
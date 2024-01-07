<?php
$servidor = "localhost";
$usuario = "root";
$clave_acceso_bd = "8DwSxS5t";
$base_datos = "365tours";

$conexion = mysqli_connect("$servidor", "$usuario", "$clave_acceso_bd", "$base_datos");

if (mysqli_connect_errno()) {
    echo "Conexión fallida" . mysqli_connect_error();
}
?>
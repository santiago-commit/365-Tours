<?php 
session_start();

if (isset($_SESSION['sesion'])) {
  if ($_SESSION['sesion'][1] == 1) {
?>

<?php
require_once('Conexion.php');
$nombres     = ($_POST['nombres']);
$apellidos   = ($_POST['apellidos']);
$area        = ($_POST['area']);
$telefono    = ($_POST['telefono']);
$cedula      = ($_POST['cedula_rif']);
$estado      = ($_POST['estado']);
$parroquia   = ($_POST['parroquia']);
$residencia  = ($_POST['residencia']);
$correo      = ($_POST['correo']);
$contrasena  = ($_POST['contrasena']);
$privilegio  = ($_POST['privilegio']);

$nombres          = explode(" ", $nombres);
$apellidos        = explode(" ", $apellidos);
$primer_nombre    = $nombres[0];
$segundo_nombre   = $nombres[1];
$primer_apellido  = $apellidos[0];
$segundo_apellido = $apellidos[1];

$registrado = 0;

$consulta = mysqli_query($conexion, "SELECT cedula_rif FROM cliente");

foreach($consulta as $i) {
    if ($i['cedula_rif'] == $cedula) {
        $registrado++;
        break;
    }
}

$consulta = mysqli_query($conexion, "SELECT correo FROM acceso");

foreach($consulta as $i) {
    if ($i['correo'] == $correo) {
        $registrado++;
        break;
    }
}

if ($registrado >= 1) {
?>          
    <script>
        alert("ERROR, DATOS YA REGISTRADAOS EN EL SISTEMA");
        window.location.href = "InsertarUsuario.php";
    </script>
<?php
}
else {
    mysqli_query($conexion, "INSERT INTO cliente (cedula_rif,
                                                    correo,
                                                    primer_nombre,
                                                    segundo_nombre,
                                                    primer_apellido,
                                                    segundo_apellido,
                                                    codigo_area,
                                                    telefono,
                                                    estado,
                                                    parroquia,
                                                    residencia)
                                    VALUES ($cedula,
                                            '$correo',
                                            '$primer_nombre',
                                            '$segundo_nombre',
                                            '$primer_apellido',
                                            '$segundo_apellido',
                                            $area,
                                            $telefono,
                                            '$estado',
                                            '$parroquia',
                                            '$residencia')");
    
    mysqli_query($conexion, "INSERT INTO acceso (correo, contrasena, privilegio) VALUES ('$correo', '$contrasena', '$privilegio')");
?>
    <script>
        window.location.href = "GestionUsuarios.php";
    </script>
<?php
} ?>

<?php }
else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } 
} else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } ?>
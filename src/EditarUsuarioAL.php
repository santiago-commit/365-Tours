<?php 
session_start();

if (isset($_SESSION['sesion'])) {
  if ($_SESSION['sesion'][1] == 1) {
?>

<?php
require_once('Conexion.php');

$cedula_rif       = ($_POST['cedula_rif']);
$correo           = ($_POST['correo']);
$primer_nombre    = ($_POST['primer_nombre']);
$segundo_nombre   = ($_POST['segundo_nombre']);
$primer_apellido  = ($_POST['primer_apellido']);
$segundo_apellido = ($_POST['segundo_apellido']);
$codigo_area      = ($_POST['codigo_area']);
$telefono         = ($_POST['telefono']);
$estado           = ($_POST['estado']);
$parroquia        = ($_POST['parroquia']);
$residencia       = ($_POST['residencia']);
$contrasena       = ($_POST['contrasena']);
$privilegio       = ($_POST['privilegio']);
$cedula_original  = ($_POST['cedula_original']);
$correo_original  = ($_POST['correo_original']);

$registrado = 0;

$consulta = mysqli_query($conexion, "SELECT cedula_rif FROM cliente");

foreach($consulta as $i) {
    if ($i['cedula_rif'] == $cedula_rif) {
      if ($i['cedula_rif'] != $cedula_original) {
        $registrado++;
        break;
      }
    }
}

$consulta = mysqli_query($conexion, "SELECT correo FROM acceso");

foreach($consulta as $i) {
    if ($i['correo'] == $correo) {
      if ($i['correo'] != $correo_original) {
        $registrado++;
        break;
      }
    }
}

if ($registrado >= 1) {
?>
  <script>alert("ERROR, DATOS YA REGISTRADOS EN EL SISTEMA");</script>
  <form name = "formulario" action = "EditarUsuario.php" method = "POST">
    <?php echo '<input name = "correo" value = "'.$correo_original.'">'; ?>
    <script>document.formulario.submit();</script>
  </form>
  
<?php
}
else {
  mysqli_query($conexion, "UPDATE cliente SET cedula_rif = $cedula_rif, 
                                              correo = '$correo', 
                                              primer_nombre = '$primer_nombre', 
                                              segundo_nombre = '$segundo_nombre', 
                                              primer_apellido = '$primer_apellido', 
                                              segundo_apellido = '$segundo_apellido', 
                                              codigo_area = $codigo_area, 
                                              telefono = $telefono, 
                                              estado = '$estado', 
                                              parroquia = '$parroquia', 
                                              residencia = '$residencia' 
                                              WHERE correo = '$correo_original'");
  mysqli_query($conexion, "UPDATE acceso SET correo = '$correo', 
                                            contrasena = '$contrasena', 
                                            privilegio = '$privilegio' 
                                            WHERE correo = '$correo_original'");
?>

<script>window.location.href = "GestionUsuarios.php"</script>

<?php } }
else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } 
} else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } ?>
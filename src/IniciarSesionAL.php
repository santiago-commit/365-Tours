<?php
$correo     = ($_POST['correo']);
$contrasena = ($_POST['contrasena']);
$log = 0;
require_once('Conexion.php');

$consulta = mysqli_query($conexion, "SELECT correo FROM acceso");
foreach($consulta as $i){
  if ($i['correo'] == $correo){
    $log++; break;
  }
}

$consulta = mysqli_query($conexion, "SELECT contrasena FROM acceso");
foreach($consulta as $i){
  if ($i['contrasena'] == $contrasena){
    $log++; break;
  }
}

$consulta = mysqli_query($conexion, "SELECT estatus FROM acceso WHERE correo = '$correo'");
foreach($consulta as $i){
  if ($i['estatus'] == 1){
    $log++; break;
  }
}

if ($log == 3){
  require_once('Session.php');

  if (isset($_SESSION['sesion'])) {
    if ($_SESSION['sesion'][1] == 1) {
      ?><script> alert("Inicio de sesión exitoso como administrador"); window.location.href = "GestionUsuarios.php"</script><?php
    }
    else if ($_SESSION['sesion'][1] == 0) {
      ?><script> alert("Inicio de sesión exitoso"); window.location.href = "Paquetes.php"</script><?php
    }
  }
}
else { ?>
  <script>
    window.location.href = "Index.php#iniciar_sesion";
    alert("ERROR, PORFAVOR INTRODUZCA BIEN LOS CAMPOS");
  </script> <?php
} ?>
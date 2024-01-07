<?php 
session_start();

if (isset($_SESSION['sesion'])) {
  if ($_SESSION['sesion'][1] == 1) {
?>

<?php
$correo = $_POST['correo'];
require_once('Conexion.php');

mysqli_query($conexion, "UPDATE cliente SET estatus = 0 WHERE correo = '$correo'");
mysqli_query($conexion, "UPDATE acceso SET estatus = 0 WHERE correo = '$correo'");
?>
<script>
  window.location.href = "GestionUsuarios.php";
  alert("Usuario eliminado satisfactoriamente");
</script> 

<?php }
else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } 
} else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } ?>
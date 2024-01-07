<?php 
session_start();

if (isset($_SESSION['sesion'])) {
  if ($_SESSION['sesion'][1] == 1) {
?>

<?php
$codigo = $_POST['codigo'];
require_once('Conexion.php');

mysqli_query($conexion, "UPDATE destino SET estatus = 0 WHERE codigo = '$codigo'");
?>
<script>
  window.location.href = "GestionDestinos.php";
  alert("Destino eliminado satisfactoriamente");
</script>

<?php }
else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } 
} else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } ?>
<?php 
session_start();

if (isset($_SESSION['sesion'])) {
  if ($_SESSION['sesion'][1] == 1) {
?>

<?php
$codigo_factura = $_POST['codigo'];
require_once('Conexion.php');


mysqli_query($conexion, "UPDATE factura SET estatus = 0 WHERE codigo = '$codigo_factura'");
?>
<script>
  window.location.href = "GestionFacturas.php";
  alert("Factura desactivada satisfactoriamente");
</script>

<?php }
else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } 
} else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } ?>
<?php 
session_start();

if (isset($_SESSION['sesion'])) {
  if ($_SESSION['sesion'][1] == 1) {
?>

<?php
$codigo_paquete = $_POST['codigo'];
require_once('Conexion.php');

$facturas_desactivadas = 0;
$facturas_desactivadas = mysqli_query($conexion, "SELECT COUNT(codigo) FROM factura WHERE paquete_codigo = '$codigo_paquete' AND estatus = 1");
foreach($facturas_desactivadas as $i) {
  $facturas_desactivadas_total = $i['COUNT(codigo)'];
}

mysqli_query($conexion, "UPDATE factura SET estatus = 0 WHERE paquete_codigo = '$codigo_paquete' AND estatus = 1");
mysqli_query($conexion, "UPDATE paquete SET estatus = 0 WHERE codigo = '$codigo_paquete'");

if ($facturas_desactivadas_total == 0) { ?>
<script>
  window.location.href = "GestionPaquetes.php";
  alert("Paquete eliminado satisfactoriamente, no han desactivado facturas");
</script>
<?php } else if ($facturas_desactivadas_total == 1) { ?>
<script>
  window.location.href = "GestionPaquetes.php";
  var texto = JSON.parse('<?php echo $facturas_desactivadas_total ?>');
  alert("Paquete eliminado satisfactoriamente, se ha desactivado " + texto + " factura");
</script>
<?php } else { ?>
  <script>
  window.location.href = "GestionPaquetes.php";
  var texto = JSON.parse('<?php echo $facturas_desactivadas_total ?>');
  alert("Paquete eliminado satisfactoriamente, se han desactivado " + texto + " facturas");
</script>
<?php } ?>

<?php }
else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } 
} else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } ?>
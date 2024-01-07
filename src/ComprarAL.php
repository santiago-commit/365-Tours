<!DOCTYPE html>

<?php 
session_start();

if (isset($_SESSION['sesion'])) {
?>

<html>
  <body>
  <?php
  require_once('Conexion.php');
  $paquete_codigo = ($_POST['paquete_codigo']);
  $destino_codigo = ($_POST['destino_codigo']);
  $personas = ($_POST['personas']);
  $metodo = ($_POST['metodo']);

  $correo = $_SESSION['sesion'][0];
  $busqueda_cliente_acceso = mysqli_query($conexion, "SELECT * FROM cliente INNER JOIN acceso WHERE acceso.correo = cliente.correo AND acceso.correo = '$correo'");
  foreach($busqueda_cliente_acceso as $i){
    $cliente_acceso = $i;
  }

  $dia = date('d') * 1;
  $mes = date('m') * 1;
  $ano = date('y') * 1;

  $fecha = date('d/m/y');
  $fecha = explode("/", $fecha);
  $dia = $fecha[0];
  $mes = $fecha[1];
  $ano = $fecha[2];
  $cedula = $cliente_acceso['cedula_rif'];
  $correo = $_SESSION['sesion'][0];
  
  mysqli_query($conexion, "INSERT INTO factura (dia, mes, ano, cantidad_personas, cliente_cedula_rif, paquete_codigo) VALUES ($dia, $mes, $ano, $personas, $cedula, $paquete_codigo)");
  $factura_codigo = mysqli_query($conexion, "SELECT MAX(codigo) FROM factura");
  foreach($factura_codigo as $i){
    $codigo_factura = $i['MAX(codigo)'];
  }
  ?>
    
    <form name = "formulario" action = "Factura.php" method = "POST">
      <?php echo '<input type = "hidden" name = "paquete_codigo" value = '.$paquete_codigo.'>';?>
      <?php echo '<input type = "hidden" name = "destino_codigo" value = '.$destino_codigo.'>';?>
      <?php echo '<input type = "hidden" name = "personas" value = '.$personas.'>';?>
      <?php echo '<input type = "hidden" name = "metodo" value = '.$metodo.'>';?>
      <?php echo '<input type = "hidden" name = "factura_codigo" value = '.$codigo_factura.'>';?>
      <?php echo '<input type = "hidden" name = "correo" value = '.$correo.'>';?>
      <script>document.formulario.submit();</script>
    </form>
  </body>
</html>

<?php }
else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } ?>
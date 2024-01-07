<?php 
session_start();

if (isset($_SESSION['sesion'])) {
  if ($_SESSION['sesion'][1] == 1) {
?>

<?php
require_once('Conexion.php');

$codigo          = ($_POST['codigo']);
$dia_salida      = ($_POST['dia_salida']);
$mes_salida      = ($_POST['mes_salida']);
$ano_salida      = ($_POST['ano_salida']);
$dia_retorno     = ($_POST['dia_retorno']);
$mes_retorno     = ($_POST['mes_retorno']);
$ano_retorno     = ($_POST['ano_retorno']);
$hora_salida     = ($_POST['hora_salida']);
$hora_retorno    = ($_POST['hora_retorno']);
$minutos_salida  = ($_POST['minutos_salida']);
$minutos_retorno = ($_POST['minutos_retorno']);
$precio_persona  = ($_POST['precio_persona']);
$transporte      = ($_POST['transporte']);
$comidas         = ($_POST['comidas']);
$fotografias     = ($_POST['fotografias']);
$destino_codigo  = ($_POST['destino_codigo']);
$codigo_original  = ($_POST['codigo_original']);

$registrado = 0;

$consulta = mysqli_query($conexion, "SELECT codigo FROM paquete");

foreach($consulta as $i) {
    if ($i['codigo'] == $codigo) {
      if ($i['codigo'] != $codigo_original) {
        $registrado++;
        break;
      }
    }
}

if ($registrado == 1) {
?>
  <script>alert("ERROR, PAQUETE YA REGISTRADO EN EL SISTEMA");</script>
  <form name = "formulario" action = "EditarPaquete.php" method = "POST">
    <?php echo '<input name = "codigo" value = "'.$codigo_original.'">'; ?>
    <script>document.formulario.submit();</script>
  </form>
<?php
}
else {
  $busqueda = mysqli_query($conexion, "SELECT codigo, estatus FROM destino");
  $destino_existe = 0;
  foreach ($busqueda as $i) {
    if ($i['codigo'] == $destino_codigo) {
      if ($i['estatus'] == 1) {
        $destino_existe = 1;
        break;
      }
    }
  }
 

  if ($destino_existe == 1) {
  mysqli_query($conexion, "UPDATE paquete SET codigo = $codigo, 
                                              dia_salida = $dia_salida, 
                                              mes_salida = $mes_salida, 
                                              ano_salida = $ano_salida, 
                                              dia_retorno = $dia_retorno, 
                                              mes_retorno = $mes_retorno, 
                                              ano_retorno = $ano_retorno, 
                                              hora_salida = $hora_salida, 
                                              hora_retorno = $hora_retorno, 
                                              minutos_salida = $minutos_salida, 
                                              minutos_retorno = $minutos_retorno, 
                                              precio_persona = $precio_persona, 
                                              transporte = '$transporte', 
                                              comidas = '$comidas', 
                                              fotografias = $fotografias, 
                                              destino_codigo = $destino_codigo 
                                              WHERE codigo = $codigo_original");
  }
  else {
    ?>
      <script>alert("ERROR, CODIGO DE DESTINO INEXISTENTE");</script>
      <form name = "formulario" action = "EditarPaquete.php" method = "POST">
        <?php echo '<input name = "codigo" value = "'.$codigo_original.'">'; ?>
        <script>document.formulario.submit();</script>
      </form>
    <?php
  }
?>

<script>window.location.href = "GestionPaquetes.php"</script>

<?php } }
else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } 
} else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } ?>
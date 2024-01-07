<?php 
session_start();

if (isset($_SESSION['sesion'])) {
  if ($_SESSION['sesion'][1] == 1) {
?>

<?php
require_once('Conexion.php');
$dia_salida = ($_POST['dia_salida']);
$mes_salida = ($_POST['mes_salida']);
$ano_salida = ($_POST['ano_salida']);
$dia_retorno = ($_POST['dia_retorno']);
$mes_retorno = ($_POST['mes_retorno']);
$ano_retorno = ($_POST['ano_retorno']);
$hora_salida = ($_POST['hora_salida']);
$hora_retorno = ($_POST['hora_retorno']);
$minutos_salida = ($_POST['minutos_salida']);
$minutos_retorno = ($_POST['minutos_retorno']);
$precio_persona = ($_POST['precio_persona']);
$transporte = ($_POST['transporte']);
$comidas = ($_POST['comidas']);
$fotografias = ($_POST['fotografias']);
$destino_codigo = ($_POST['destino_codigo']);
$registrado = 0;

$consulta = mysqli_query($conexion, "SELECT codigo, estatus FROM destino");

foreach($consulta as $i) {
    if ($i['codigo'] == $destino_codigo) {
      if ($i['estatus'] == 1) {
        $registrado++;
        break;
      }
    }
}

if ($registrado == 0) {
?>          
    <script>
        alert("ERROR, CODIGO DE PAQUETE INEXISTENTE");
        window.location.href = "InsertarPaquete.php";
    </script>
<?php
}
else { 
    mysqli_query($conexion, "INSERT INTO paquete VALUES (NULL, $dia_salida, $mes_salida, $ano_salida, 
                                                              $dia_retorno, $mes_retorno, $ano_retorno,
                                                              $hora_salida, $hora_retorno, $minutos_salida,
                                                              $minutos_retorno, $precio_persona, '$transporte',
                                                              '$comidas', $fotografias, 1, $destino_codigo)");
?>
    <script>window.location.href = "GestionPaquetes.php";</script>
<?php
} ?>

<?php }
else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } 
} else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } ?>
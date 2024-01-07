<?php 
session_start();

if (isset($_SESSION['sesion'])) {
  if ($_SESSION['sesion'][1] == 1) {
?>

<?php
require_once('Conexion.php');

$codigo          = ($_POST['codigo']);
$nombre          = ($_POST['nombre']);
$nombre_original = ($_POST['nombre_original']);
$estado          = ($_POST['estado']);
$descripcion     = ($_POST['descripcion']);
$file            = ($_FILES['url']);

if (($_FILES['url']['type'] == 'image/png') or ($_FILES['url']['name'] == "")) {

  $registrado = 0;

  $consulta = mysqli_query($conexion, "SELECT nombre FROM destino");

  foreach($consulta as $i) {
      if ($i['nombre'] == $nombre) {
        if ($i['nombre'] != $nombre_original) {
          $registrado++;
          break;
        }
      }
  }

  if ($registrado == 1) {
  ?>
    <script>alert("ERROR, DESTINO YA REGISTRADO EN EL SISTEMA");</script>
    <form name = "formulario" action = "EditarDestino.php" method = "POST">
      <?php echo '<input name = "codigo" value = "'.$codigo_original.'">'; ?>
      <script>document.formulario.submit();</script>
    </form>
  <?php
  }
  else {
    $url = $file['name'];

    if ($url == "") {
    mysqli_query($conexion, "UPDATE destino SET nombre = '$nombre', estado = '$estado', descripcion = '$descripcion' WHERE codigo = $codigo");
    } else {
      ///////////////////////////
      $url = explode('.', $url);
      $url = $url[0];
      move_uploaded_file($file['tmp_name'], '../img/'.$file['name']);
      mysqli_query($conexion, "UPDATE destino SET nombre = '$nombre', estado = '$estado', descripcion = '$descripcion', url = '$url' WHERE codigo = $codigo");
    }

    ?>

  <!--<script>window.location.href = "GestionDestinos.php"</script>-->
  <script>window.location.href = "GestionDestinos.php"</script>
  

<?php } }
else { ?>
  <form name = "formulario" action = "EditarDestino.php" method = "POST">
    <?php echo '<input type = "hidden" name = "codigo" value = "'.$codigo.'">'; ?>
    <script>alert("ERROR, ARCHIVO CON EXTENSIÓN NO .PNG");</script>
    <script>document.formulario.submit();</script>
  </form>
<?php }
?>  
<?php }
else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } 
} else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } ?>
<?php 
session_start();

if (isset($_SESSION['sesion'])) {
  if (($_SESSION['sesion'][1] == 1) and (isset($_FILES['url']))) {
?>

<?php
require_once('Conexion.php');
$nombre = ($_POST['nombre']);
$estado = ($_POST['estado']);
$descripcion = ($_POST['descripcion']);

$file = $_FILES['url'];

if ($_FILES['url']['type'] == 'image/png') {

  $url = explode('.', $file['name']);
  $url = $url[0];

  $registrado = 0;
  $consulta = mysqli_query($conexion, "SELECT nombre, estatus FROM destino");

  foreach($consulta as $i) {
      if ($i['nombre'] == $nombre) {
        if ($i['estatus'] == 1) {
          $registrado++;
          break;
        }
      }
  }

  if ($registrado == 1) {
  ?>          
      <script>
          alert("ERROR, EL NOMBRE DE ESE DESTINO YA EXISTE");
          window.location.href = "InsertarDestino.php";
      </script>
  <?php
  }
  else { 
      move_uploaded_file($file['tmp_name'], '../img/'.$file['name']);
      mysqli_query($conexion, "INSERT INTO destino VALUES (NULL, '$nombre', '$estado','$descripcion', '$url', 1)");
  ?>
      <script>window.location.href = "GestionDestinos.php";</script>
  <?php
  } 
}
else { ?>
  <script>
      alert("ERROR, ARCHIVO CON EXTENSIÓN NO .PNG");
      window.location.href = "InsertarDestino.php";
  </script>
<?php } ?>

<?php }
else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } 
} else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } ?>
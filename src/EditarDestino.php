<!DOCTYPE html>

<?php 
session_start();

if (isset($_SESSION['sesion'])) {
  if ($_SESSION['sesion'][1] == 1) {
?>

<html lang = "es">
  <head>
    <title>365 TOURS</title>
    <link href = "styles.css" rel = "stylesheet">
    <meta charset = "utf-8">
  </head>

  <body>
    <!--HEADER-->
    <div class = "menu">
      <ul>
        <a href = "#"><img src = "../img/logo.png"></a>
          <li><a href = "CerrarSesion.php">CERRAR SESIÓN</a></li>
          <li><a href = "GestionUsuarios.php">GESTIÓN DE USUARIOS</a></button>
            <ul>
              <li><a href = "GestionPaquetes.php">GESTIÓN DE PAQUETES</a></button></li>
              <li><a href = "GestionDestinos.php">GESTIÓN DE DESTINOS</a></button></li>
              <li><a href = "GestionFacturas.php">GESTIÓN DE FACTURAS</a></button></li>
            </ul>
          </li>
      </ul>
    </div>

      <?php $codigo = $_POST['codigo']; 
      
      require_once('Conexion.php');
      $busqueda = mysqli_query($conexion, "SELECT codigo, nombre, estado, descripcion, url, estatus FROM destino WHERE codigo = $codigo");
      ?>

      <div class = "tabla_gestion">
        <table>
        <?php foreach($busqueda as $fila) { 
          echo '
            <form action = "EditarDestinoAL.php" method = "POST" enctype = "multipart/form-data">
              <input type = "hidden" name = "codigo" value = "'.$fila["codigo"].'" required>

              <input type = "hidden" name = "nombre_original" value = "'.$fila["nombre"].'" required>
              <tr><th style = "text-align: right">Nombre</th> <td><input type = "text" name = "nombre" value = "'.$fila["nombre"].'" required></td></tr>
              <tr><th style = "text-align: right">Estado</th> <td>
              <select id = "estado" name = "estado">
                <option value = "'.$fila["estado"].'">'.$fila["estado"].'</option>
                <option value = "Amazonas">Amazonas</option>
                <option value = "Anzoátegui">Anzoátegui</option>
                <option value = "Apure">Apure</option>
                <option value = "Aragua">Aragua</option>
                <option value = "Barinas">Barinas</option>
                <option value = "Bolívar">Bolívar</option>
                <option value = "Carabobo">Carabobo</option>
                <option value = "Cojedes">Cojedes</option>
                <option value = "Delta Amacuro">Delta Amacuro</option>
                <option value = "Distrito Capital">Distrito Capital</option>
                <option value = "Falcón">Falcón</option>
                <option value = "Guárico">Guárico</option>
                <option value = "La Guaira">La Guaira</option>
                <option value = "Lara">Lara</option>
                <option value = "Mérida">Mérida</option>
                <option value = "Miranda">Miranda</option>
                <option value = "Monagas">Monagas</option>
                <option value = "Nueva Esparta">Nueva Esparta</option>
                <option value = "Portuguesa">Portuguesa</option>
                <option value = "Sucre">Sucre</option>
                <option value = "Táchira">Táchira</option>
                <option value = "Trujillo">Trujillo</option>
                <option value = "Yaracuy">Yaracuy</option>
                <option value = "Zulia">Zulia</option>
              </select>
              <tr><th style = "text-align: right">Descripcion</th> <td><input type = "text" name = "descripcion" value = "'.$fila["descripcion"].'" required></td></tr>
              <tr><th style = "text-align: right">Imagen (PNG)</th> <td><input type = "file" name = "url" class = "anadir"></td></tr>

              <tr><th></th> <th><button class = "anadir" type = "submit">ACEPTAR</button></th></tr>
            </form>
          ';
        } ?>
        </table>
      </div>

    <footer>
        <ul>
          <a href = "#"><img src = "../img/logo-2.png"></a>
          <li><img src = "../img/ubicacion.png"><a target = "_blank" href = "https://www.google.com/maps/place/Catia,+Caracas+1030,+Distrito+Capital/@10.5156614,-66.9471858,17z/data=!3m1!4b1!4m5!3m4!1s0x8c2a5ef41d6113a5:0x1674c3ec3ee0cbde!8m2!3d10.5150298!4d-66.9444446">Ubicación</a></li>
          <li><img src = "../img/email.png"><a target = "_blank" href = "https://mail.google.com">365toursinfo@gmail.com</a></li>
          <li><img src = "../img/whatsapp.png"><a target = "_blank" href = "https://web.whatsapp.com">+58 424-1379690</a></li>

        </ul>
        <br>
        <a href = "#">365 TOURS, TODOS LOS DERECHOS RESERVADOS</a>
    </footer>
    
  </body>
</html>

<?php }
else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } 
} else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } ?>
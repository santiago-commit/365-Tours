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

      <div class = "tabla_gestion">
        <table>
          <tr>
            <th>Nombre<br><br></th>
            <th>Estado<br><br></th>
            <th>
              <form action = "InsertarDestino.php" method = "POST">
                <button class = "anadir" type = "submit">INSERTAR</button>
              </form>
            </th>
          </tr>

          <script>function confirmar() {
            var respuesta = confirm("¿Seguro que deseas eliminar el destino?");
            if (respuesta == true) { 
              return true;
            }
            else {
              return false;
            }
          }</script>

          <?php
            require_once('Conexion.php');
            $busqueda = mysqli_query($conexion, "SELECT codigo, nombre, estado FROM destino WHERE estatus = 1"); 
            
            foreach($busqueda as $fila) {
              echo '
                <tr>
                  <td style = "padding: 0px 10px 0px 10px">'.$fila["nombre"].'</td>
                  <td style = "padding: 0px 10px 0px 10px">'.$fila["estado"].'</td>
                  <th>
                    <form action = "EliminarDestinoAL.php" method = "POST">
                      <button class = "eliminar" name = "codigo" type = "submit" value = "'.$fila["codigo"].'" onclick = "return confirmar()">ELIMINAR</button>
                    </form>
                  </th>
                  <th>
                    <form action = "EditarDestino.php" method = "POST">
                      <button class = "anadir" name = "codigo" type = "submit" value = "'.$fila["codigo"].'">EDITAR</button>
                    </form>
                  </th>
                </tr>
              ';
            }
          ?>
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
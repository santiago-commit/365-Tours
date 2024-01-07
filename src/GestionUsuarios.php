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
            <th>Cedula_rif<br><br></th>
            <th>Correo<br><br></th>
            <th>Nombre<br><br></th>
            <th>Apellido<br><br></th>
            <th>Privilegio<br><br></th>
            <th>
              <form action = "InsertarUsuario.php" method = "POST">
                <button class = "anadir" type = "submit">INSERTAR</button>
              </form>
            </th>
          </tr>

          <script>function confirmar() {
            var respuesta = confirm("¿Seguro que deseas eliminar al usuario?");
            if (respuesta == true) { 
              return true;
            }
            else {
              return false;
            }
          }</script>
  
          <?php
            require_once('Conexion.php');
            $busqueda = mysqli_query($conexion, "SELECT * FROM cliente INNER JOIN acceso WHERE cliente.correo = acceso.correo"); 

              foreach($busqueda as $fila) { 
                if ($fila["estatus"] != 0) {
                  echo '
                    <tr>
                      <td style = "padding: 0px 10px 0px 10px">'.$fila["cedula_rif"].'</td>
                      <td style = "padding: 0px 10px 0px 10px">'.$fila["correo"].'</td>
                      <td style = "padding: 0px 10px 0px 10px">'.$fila["primer_nombre"].'</td>
                      <td style = "padding: 0px 10px 0px 10px">'.$fila["primer_apellido"].'</td>
                      ';
                      if ($fila['privilegio'] == 1){
                        echo '<td style = "padding: 0px 10px 0px 10px">Administrador</td>';
                      }
                      else {
                        echo '<td style = "padding: 0px 10px 0px 10px">Usuario</td>';
                      }
                    echo '
                      <th>
                        <form action = "EliminarUsuarioAL.php" method = "POST">
                          <button class = "eliminar" name = "correo" type = "submit" value = "'.$fila["correo"].'" onclick = "return confirmar()">ELIMINAR</button>
                        </form>
                      </th>
                      <th>
                        <form action = "EditarUsuario.php" method = "POST">
                          <button class = "anadir" name = "correo" type = "submit" value = "'.$fila["correo"].'">EDITAR</button>
                        </form>
                      </th>
                    </tr>
                  ';
                }
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
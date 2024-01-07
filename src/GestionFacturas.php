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
            <th>Dia<br><br></th>
            <th>Mes<br><br></th>
            <th>Año<br><br></th>
            <th>Cantidad de <br>personas<br><br></th>
            <th>Nombre del <br>comprador<br><br></th>
            <th>Apellido del <br>comprador<br><br></th>
            <th>Nombre del destino<br><br></th>
          </tr>

          <script>function confirmar() {
            var respuesta = confirm("¿Seguro que deseas desactivar la factura?");
            if (respuesta == true) { 
              return true;
            }
            else {
              return false;
            }
          }</script>
  
          <?php
            require_once('Conexion.php');
            $busqueda = mysqli_query($conexion, "SELECT codigo, correo, dia, mes, ano, cantidad_personas, primer_nombre, primer_apellido, paquete_codigo, factura.estatus FROM factura INNER JOIN cliente WHERE cliente.cedula_rif = factura.cliente_cedula_rif"); 

              foreach($busqueda as $fila) { 
                if ($fila["estatus"] != 0) {
                  echo '
                    <tr>
                      <td style = "padding: 0px 10px 0px 10px">'.$fila["dia"].'</td>
                      <td style = "padding: 0px 10px 0px 10px">'.$fila["mes"].'</td>
                      <td style = "padding: 0px 10px 0px 10px">'.$fila["ano"].'</td>
                      <td style = "padding: 0px 10px 0px 10px">'.$fila["cantidad_personas"].'</td>
                      <td style = "padding: 0px 10px 0px 10px">'.$fila["primer_nombre"].'</td>
                      <td style = "padding: 0px 10px 0px 10px">'.$fila["primer_apellido"].'</td>';
                      $paquete_codigo = $fila['paquete_codigo'];
                      $busqueda2 = mysqli_query($conexion, "SELECT destino.nombre, destino.estatus FROM destino JOIN paquete WHERE destino.codigo = paquete.destino_codigo AND paquete.codigo = '$paquete_codigo'"); 
                      foreach($busqueda2 as $fila2) { 

                          echo '<td style = "padding: 0px 10px 0px 10px">'.$fila2["nombre"].'</td>';

                      }
                      echo '
                      <th>
                        <form action = "EliminarFacturaAL.php" method = "POST">
                          <button class = "eliminar" name = "codigo" type = "submit" value = "'.$fila["codigo"].'" onclick = "return confirmar()">DESACTIVAR</button>
                        </form>
                      </th>
                      <th>
                        <form action = "Factura.php" method = "POST">
                          <button class = "anadir" type = "submit">VER</button>
                          <input type = "hidden" name = "paquete_codigo" value = '.$fila['paquete_codigo'].'>';
                          $busqueda3 = mysqli_query($conexion, "SELECT destino.codigo, destino.estatus FROM destino JOIN paquete WHERE destino.codigo = paquete.destino_codigo AND paquete.codigo = '$paquete_codigo'"); 
                          foreach($busqueda3 as $fila3) { 

                              echo '<input type = "hidden" name = "destino_codigo" value = '.$fila3['codigo'].'>';

                          }
                          echo '
                          <input type = "hidden" name = "personas" value = '.$fila['cantidad_personas'].'>
                          <input type = "hidden" name = "factura_codigo" value = '.$fila['codigo'].'>
                          <input type = "hidden" name = "correo" value = '.$fila['correo'].'>
                        </form>
                      </th> 
                    </tr>
                  ';
                }
              }
          ?>
        </table>
      </div>

      <script>function confirmar() {
          var respuesta = confirm("¿Seguro que deseas desactivar la factura?");
          if (respuesta == true) { 
            return true;
          }
          else {
            return false;
          }
      }</script>

      <?php
        require_once('Conexion.php');
        $busqueda = mysqli_query($conexion, "SELECT COUNT(codigo) FROM factura WHERE estatus = 0"); 
        $eliminadas = 0;
        foreach($busqueda as $i) {
          if ($i['COUNT(codigo)'] > 0) {
            $eliminadas = 1;
          } 
        }
      ?>

      <?php if ($eliminadas == 1) { ?>
        

      <h1 style = "color: black; text-align: center; font-size: 35px">Facturas desactivadas:</h1>
      <div class = "tabla_gestion">
        <table>
          <tr>
            <th>Dia<br><br></th>
            <th>Mes<br><br></th>
            <th>Año<br><br></th>
            <th>Cantidad de <br>personas<br><br></th>
            <th>Nombre del <br>comprador<br><br></th>
            <th>Apellido del <br>comprador<br><br></th>
            <th>Nombre del destino<br><br></th>
          </tr>
  
          <?php
            require_once('Conexion.php');
            $busqueda = mysqli_query($conexion, "SELECT codigo, correo, dia, mes, ano, cantidad_personas, primer_nombre, primer_apellido, paquete_codigo, factura.estatus FROM factura INNER JOIN cliente WHERE cliente.cedula_rif = factura.cliente_cedula_rif"); 

              foreach($busqueda as $fila) { 
                if ($fila["estatus"] == 0) {
                  echo '
                    <tr>
                      <td style = "padding: 0px 10px 0px 10px">'.$fila["dia"].'</td>
                      <td style = "padding: 0px 10px 0px 10px">'.$fila["mes"].'</td>
                      <td style = "padding: 0px 10px 0px 10px">'.$fila["ano"].'</td>
                      <td style = "padding: 0px 10px 0px 10px">'.$fila["cantidad_personas"].'</td>
                      <td style = "padding: 0px 10px 0px 10px">'.$fila["primer_nombre"].'</td>
                      <td style = "padding: 0px 10px 0px 10px">'.$fila["primer_apellido"].'</td>';
                      $paquete_codigo = $fila['paquete_codigo'];
                      $busqueda2 = mysqli_query($conexion, "SELECT destino.nombre FROM destino JOIN paquete WHERE destino.codigo = paquete.destino_codigo AND paquete.codigo = '$paquete_codigo'"); 
                      foreach($busqueda2 as $fila2) { 
                          echo '<td style = "padding: 0px 10px 0px 10px">'.$fila2["nombre"].'</td>';
                      }
                      echo '
                      <th>
                        <form action = "Factura.php" method = "POST">
                          <button class = "anadir" type = "submit">VER</button>
                          <input type = "hidden" name = "paquete_codigo" value = '.$fila['paquete_codigo'].'>';
                          $busqueda3 = mysqli_query($conexion, "SELECT destino.codigo FROM destino JOIN paquete WHERE destino.codigo = paquete.destino_codigo AND paquete.codigo = '$paquete_codigo'"); 
                          foreach($busqueda3 as $fila3) { 
                              echo '<input type = "hidden" name = "destino_codigo" value = '.$fila3['codigo'].'>';
                          }
                          echo '
                          <input type = "hidden" name = "personas" value = '.$fila['cantidad_personas'].'>
                          <input type = "hidden" name = "factura_codigo" value = '.$fila['codigo'].'>
                          <input type = "hidden" name = "correo" value = '.$fila['correo'].'>

                        </form>
                      </th> 
                    </tr>
                  ';
                }
              }
          ?>
        </table>
      </div>

      <?php } ?>


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
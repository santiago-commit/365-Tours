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
      $busqueda = mysqli_query($conexion, "SELECT paquete.codigo,
                                                  paquete.destino_codigo,
                                                  dia_salida, 
                                                  mes_salida, 
                                                  ano_salida, 
                                                  dia_retorno, 
                                                  mes_retorno, 
                                                  ano_retorno, 
                                                  hora_salida, 
                                                  hora_retorno, 
                                                  minutos_salida, 
                                                  minutos_retorno, 
                                                  precio_persona, 
                                                  transporte, 
                                                  comidas, 
                                                  fotografias,
                                                  nombre
                                                  FROM paquete 
                                                  INNER JOIN destino 
                                                  WHERE paquete.destino_codigo = destino.codigo 
                                                  AND paquete.codigo = $codigo");
      ?>

      <div class = "tabla_gestion">
        <table>
        <?php foreach($busqueda as $fila) { 
          echo '
            <form action = "EditarPaqueteAL.php" method = "POST">
              <input type = "hidden" name = "codigo" value = "'.$fila["codigo"].'">
              
              <tr><th style = "text-align: right">Dia de salida</th> <td>
                <select id = "dia_salida" name = "dia_salida">';
                    for ($i = 1; $i <= 31; $i++) {
                      if ($i != $fila['dia_salida']) echo '<option value = "'.$i.'">'.$i.'</option>';
                      else echo '<option value = "'.$i.'" selected>'.$i.'</option>';
                    } 
                echo '</select>
              </td></tr>

              <tr><th style = "text-align: right">Mes de salida</th> <td>
                <select id = "mes_salida" name = "mes_salida">';
                    for ($i = 1; $i <= 12; $i++) {
                      if ($i != $fila['mes_salida']) echo '<option value = "'.$i.'">'.$i.'</option>';
                      else echo '<option value = "'.$i.'" selected>'.$i.'</option>';
                    } 
                echo '</select>
              </td></tr>

              <tr><th style = "text-align: right">Año de salida</th> <td>
                <select id = "ano_salida" name = "ano_salida">';
                    for ($i = 2023; $i <= 3000; $i++) {
                      if ($i != $fila['ano_salida']) echo '<option value = "'.$i.'">'.$i.'</option>';
                      else echo '<option value = "'.$i.'" selected>'.$i.'</option>';
                    } 
                echo '</select>
              </td></tr>

              <tr><th style = "text-align: right">Dia de retorno</th> <td>
                <select id = "dia_retorno" name = "dia_retorno">';
                    for ($i = 1; $i <= 31; $i++) {
                      if ($i != $fila['dia_retorno']) echo '<option value = "'.$i.'">'.$i.'</option>';
                      else echo '<option value = "'.$i.'" selected>'.$i.'</option>';
                    } 
                echo '</select>
              </td></tr>

              <tr><th style = "text-align: right">Mes de retorno</th> <td>
                <select id = "mes_retorno" name = "mes_retorno">';
                    for ($i = 1; $i <= 12; $i++) {
                      if ($i != $fila['mes_retorno']) echo '<option value = "'.$i.'">'.$i.'</option>';
                      else echo '<option value = "'.$i.'" selected>'.$i.'</option>';
                    } 
                echo '</select>
              </td></tr>

              <tr><th style = "text-align: right">Año de retorno</th> <td>
                <select id = "ano_retorno" name = "ano_retorno">';
                    for ($i = 2023; $i <= 3000; $i++) {
                      if ($i != $fila['ano_retorno']) echo '<option value = "'.$i.'">'.$i.'</option>';
                      else echo '<option value = "'.$i.'" selected>'.$i.'</option>';
                    } 
                echo '</select>
              </td></tr>


              <tr><th style = "text-align: right">Hora de salida</th> <td>
                <select id = "hora_salida" name = "hora_salida">';
                    for ($i = 1; $i <= 24; $i++) {
                      if ($i != $fila['hora_salida']) echo '<option value = "'.$i.'">'.$i.'</option>';
                      else echo '<option value = "'.$i.'" selected>'.$i.'</option>';
                    } 
                echo '</select>
              </td></tr>
              <tr><th style = "text-align: right">Hora de retorno</th> <td>
                <select id = "hora_retorno" name = "hora_retorno">';
                    for ($i = 1; $i <= 24; $i++) {
                      if ($i != $fila['hora_retorno']) echo '<option value = "'.$i.'">'.$i.'</option>';
                      else echo '<option value = "'.$i.'" selected>'.$i.'</option>';
                    } 
                echo '</select>
              </td></tr>


              <tr><th style = "text-align: right">Minutos de salida</th> <td>
                <select id = "minutos_salida" name = "minutos_salida">';
                    for ($i = 0; $i <= 59; $i++) {
                      if ($i != $fila['minutos_salida']) echo '<option value = "'.$i.'">'.$i.'</option>';
                      else echo '<option value = "'.$i.'" selected>'.$i.'</option>';
                    } 
                echo '</select>
              </td></tr>
              
              <tr><th style = "text-align: right">Minutos de retorno</th> <td>
                <select id = "minutos_retorno" name = "minutos_retorno">';
                    for ($i = 0; $i <= 59; $i++) {
                      if ($i != $fila['minutos_retorno']) echo '<option value = "'.$i.'">'.$i.'</option>';
                      else echo '<option value = "'.$i.'" selected>'.$i.'</option>';
                    } 
                echo '</select>
              </td></tr>

              <tr><th style = "text-align: right">Precio por persona ($)</th> <td><input type = "number" name = "precio_persona" value = "'.$fila["precio_persona"].'"></td></tr>
              
              <tr><th style = "text-align: right">Transporte</th> <td>
                <select id = "transporte" name = "transporte">';
                  if ($fila['transporte'] == "Vía terrestre") {
                    echo '
                    <option value = "Vía terrestre" selected>Vía terrestre</option>
                    <option value = "Vía aerea">Vía aerea</option>
                    <option value = "Vía marítima">Vía marítima</option>
                    ';
                  }
                  else if ($fila['transporte'] == "Vía aerea") {
                    echo '
                    <option value = "Vía terrestre">Vía terrestre</option>
                    <option value = "Vía aerea" selected>Vía aerea</option>
                    <option value = "Vía marítima">Vía marítima</option>
                    ';
                  }
                  else if ($fila['transporte'] == "Vía marítima") {
                    echo '
                    <option value = "Vía terrestre">Vía terrestre</option>
                    <option value = "Vía aerea">Vía aerea</option>
                    <option value = "Vía marítima" selected>Vía marítima</option>
                    ';
                  }
                  else {
                    echo '
                    <option value = "Vía terrestre">Vía terrestre</option>
                    <option value = "Vía aerea">Vía aerea</option>
                    <option value = "Vía marítima">Vía marítima</option>
                    ';
                  }
                echo ' 
                </select>
              </td></tr>

              <tr><th style = "text-align: right">Comidas</th> <td><input type = "text" name = "comidas" value = "'.$fila["comidas"].'"></td></tr>';

              if ($fila['fotografias'] == 1) {
              echo '  
              <tr>
                <th style = "text-align: right">Fotografias</th> 
                <td style = "text-align : left; padding: 10px 0px 10px 20px;">
                  Si <input style = "width : 10px" type = "radio" value = "1" id = "1" name = "fotografias" checked = "checked" required>
                  No <input style = "width : 10px" type = "radio" value = "0" id = "0" name = "fotografias" required>
                </td>
              </tr>
              ';
              }
              else {
              echo '
              <tr>
                <th style = "text-align: right">Fotografias</th> 
                <td style = "text-align : left; padding: 10px 0px 10px 20px;">
                  Si <input style = "width : 10px" type = "radio" value = "1" id = "1" name = "fotografias" checked = "checked" required>
                  No <input style = "width : 10px" type = "radio" value = "0" id = "0" name = "fotografias" required>
                </td>
              </tr>
              ';
              }

              echo '</datalist>
              <tr><th style = "text-align: right">Codigo de destino</th> <td>
                <select id = "destino_codigo" name = "destino_codigo">';
                  $consulta_destino_codigos = mysqli_query($conexion, "SELECT codigo, nombre, estatus FROM destino");
                  $encontrado = 0;
                  foreach($consulta_destino_codigos as $i) { 
                    if ($i['estatus'] == 1) {
                      if ( $i['nombre'] != $fila['nombre']) { echo '<option value = '.$i['codigo'].'>'.$i['nombre'].'</option>';}
                      else { 
                        echo '<option value = '.$i['codigo'].' selected>'.$i['nombre'].'</option>'; 
                        $encontrado = 1; 
                      }
                    }
                  }
                  if ($encontrado != 1) { echo '<option selected> DESTINO INASIGNADO </option>'; }
                echo '</select>
              </td></tr>
              
              <input type = "hidden" name = "codigo_original" value = "'.$fila["codigo"].'">
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
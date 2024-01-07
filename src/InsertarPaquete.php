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

      <?php
      require_once('Conexion.php');
      ?>

      <div class = "tabla_gestion">
        <table>
            <form action = "InsertarPaqueteAL.php" method = "POST">
              <tr><th style = "text-align: right">Dia de salida</th> <td>
              <select id = "dia_salida" name = "dia_salida">
                <?php for ($i = 1; $i <= 31; $i++) {
                  echo '<option value = "'.$i.'">'.$i.'</option>';
                } ?>
              </select>
              </td></tr>
              <tr><th style = "text-align: right">Mes de salida</th> <td>
              <select id = "mes_salida" name = "mes_salida">
                  <option value = "1">Enero</option>
                  <option value = "2">Febrero</option>
                  <option value = "3">Marzo</option>
                  <option value = "4">Abril</option>
                  <option value = "5">Mayo</option>
                  <option value = "6">Junio</option>
                  <option value = "7">Julio</option>
                  <option value = "8">Agosto</option>
                  <option value = "9">Septiembre</option>
                  <option value = "10">Octubre</option>
                  <option value = "11">Noviembre</option>
                  <option value = "12">Diciembre</option>
              </select>
              </td></tr>
              <tr><th style = "text-align: right">Ano de salida</th> <td>
              <select id = "ano_salida" name = "ano_salida">
                <?php for ($i = 2023; $i <= 3000; $i++) {
                  echo '<option value = "'.$i.'">'.$i.'</option>';
                } ?>
              </select>
              </td></tr>

              <tr><th style = "text-align: right">Dia de retorno</th> <td>
              <select id = "dia_retorno" name = "dia_retorno">
                <?php for ($i = 1; $i <= 31; $i++) {
                  echo '<option value = "'.$i.'">'.$i.'</option>';
                } ?>
              </select>
              </td></tr>
              <tr><th style = "text-align: right">Mes de retorno</th> <td>
              <select id = "mes_retorno" name = "mes_retorno">
                  <option value = "1">Enero</option>
                  <option value = "2">Febrero</option>
                  <option value = "3">Marzo</option>
                  <option value = "4">Abril</option>
                  <option value = "5">Mayo</option>
                  <option value = "6">Junio</option>
                  <option value = "7">Julio</option>
                  <option value = "8">Agosto</option>
                  <option value = "9">Septiembre</option>
                  <option value = "10">Octubre</option>
                  <option value = "11">Noviembre</option>
                  <option value = "12">Diciembre</option>
              </select>
              </td></tr>
              <tr><th style = "text-align: right">Ano de retorno</th> <td>
              <select id = "ano_retorno" name = "ano_retorno">
                <?php for ($i = 2023; $i <= 3000; $i++) {
                  echo '<option value = "'.$i.'">'.$i.'</option>';
                } ?>
              </select>
              </td></tr>

              <tr><th style = "text-align: right">Hora de salida</th> <td>
              <select id = "hora_salida" name = "hora_salida">
                <?php for ($i = 1; $i <= 24; $i++) {
                  echo '<option value = "'.$i.'">'.$i.'</option>';
                } ?>
              </select>
              </td></tr>
              <tr><th style = "text-align: right">Hora de retorno</th> <td>
              <select id = "hora_retorno" name = "hora_retorno">
                <?php for ($i = 1; $i <= 24; $i++) {
                  echo '<option value = "'.$i.'">'.$i.'</option>';
                } ?>
              </select>
              </td></tr>

              <tr><th style = "text-align: right">Minutos de salida</th> <td>
              <select id = "minutos_salida" name = "minutos_salida">
                <?php for ($i = 0; $i <= 59; $i++) {
                  echo '<option value = "'.$i.'">'.$i.'</option>';
                } ?>
              </select>
              </td></tr>

              <tr><th style = "text-align: right">Minutos de retorno</th> <td>
              <select id = "minutos_retorno" name = "minutos_retorno">
                <?php for ($i = 0; $i <= 59; $i++) {
                  echo '<option value = "'.$i.'">'.$i.'</option>';
                } ?>
              </select>
              </td></tr>

              <tr><th style = "text-align: right">Precio por persona ($)</th> <td><input type = "number" name = "precio_persona" required></td></tr>

              <tr><th style = "text-align: right">Transporte</th> <td>
                <select id = "transporte" name = "transporte">
                  <option value = "Vía terrestre">Vía terrestre</option>
                  <option value = "Vía aerea">Vía aerea</option>
                  <option value = "Vía marítima">Vía marítima</option>
                </select>
              </td></tr>
              
              <tr><th style = "text-align: right">Comidas</th> <td><input type = "text" name = "comidas" required></td></tr>

              <tr>
                <th style = "text-align: right">Fotografias</th> 
                <td style = "text-align : left; padding: 10px 0px 10px 20px;">
                  Si <input style = "width : 10px" type = "radio" value = "1" id = "1" name = "fotografias" checked = "checked" required>
                  No <input style = "width : 10px" type = "radio" value = "0" id = "0" name = "fotografias" required>
                </td>
              </tr>

              <tr><th style = "text-align: right">Destino</th> <td>
                <select id = "destino_codigo" name = "destino_codigo">
                  <?php $consulta_destino_codigos = mysqli_query($conexion, "SELECT codigo, nombre, estatus FROM destino");
                  foreach($consulta_destino_codigos as $i) { 
                    if ($i['estatus'] == 1) {
                      echo '<option value = '.$i['codigo'].'>'.$i['nombre'].'</option>';
                    }
                  } ?>
                </select>
              </td></tr>
              
              
              <tr><th></th> <th><button class = "anadir" type = "submit">ACEPTAR</button></th></tr>
            </form>
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
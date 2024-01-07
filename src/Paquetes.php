<!DOCTYPE html>

<?php 
session_start();

if (isset($_SESSION['sesion'])) {
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
          <li><a href = "Paquetes.php">PAQUETES</a>
            <ul>
              <li><a href = "Historial.php">HISTORIAL DE COMPRAS</a></button></li>
            </ul>
          </li>
      </ul>
    </div>

    <!--BANNER-->
    <img src = "../img/banner.png" width="100%">

    <!--CAYOS-->
    <?php require_once('Conexion.php'); ?>

    <div class = "cayos">

    <?php $busqueda_destino_paquete = mysqli_query($conexion, "SELECT destino.codigo, destino.estado, url, nombre, precio_persona, dia_salida, mes_salida, ano_salida, hora_salida, minutos_salida, dia_retorno, mes_retorno, ano_retorno, hora_retorno, minutos_retorno, paquete.estatus FROM paquete INNER JOIN destino WHERE destino.codigo = paquete.destino_codigo");

    foreach($busqueda_destino_paquete as $i){ 
      $destino_codigo = $i['codigo'];
      $busqueda_destino_estatus = mysqli_query($conexion, "SELECT destino.estatus FROM destino INNER JOIN paquete WHERE destino.codigo = paquete.destino_codigo AND destino.codigo = $destino_codigo");
      foreach($busqueda_destino_estatus as $k) {
        $destino_estatus = $k['estatus'];
      }
      if ($i['estatus'] == 1) {
      if ($destino_estatus == 1) {?>
      <div>
        <?php echo '<img style = "aspect-ratio: 16/9" src = "../img/'.$i['url'].'.png">'; ?>
        <?php echo '<h4>'.$i['nombre'].'</h4>' ?>
        <ul>
          <?php echo '<li>'. $i ["precio_persona"] .'$ por persona</li>'?>
          <?php echo '<li>Fecha de salida: '. $i ["dia_salida"] .'/'. $i ["mes_salida"] .'/'. $i ["ano_salida"] .'</li>'?>
          <?php echo '<li>Hora de salida: '. $i ["hora_salida"] .':'. $i ["minutos_salida"] .' horas'.'</li>'?>
          <?php echo '<li>Fecha de retorno: '. $i ["dia_retorno"] .'/'. $i ["mes_retorno"] .'/'. $i ["ano_retorno"] .'</li>'?>
          <?php echo '<li>Hora de retorno: '. $i ["hora_retorno"] .':'. $i ["minutos_retorno"] .' horas'.'</li>'?>
          <?php echo '<li>Estado: '. $i["estado"] .'</li>'?>
        </ul>
        <form action = "Cayo.php" method = "POST">
          <?php
            $destino_codigo = $i['codigo'];
            $busqueda_paquete = mysqli_query($conexion, "SELECT paquete.codigo FROM paquete INNER JOIN destino WHERE destino.codigo = paquete.destino_codigo AND destino.codigo = '$destino_codigo' AND paquete.estatus = 1");
            foreach($busqueda_paquete as $j){
              $paquete_codigo = $j['codigo'];
            }
            echo '<input name = "paquete_codigo" value = '.$paquete_codigo.' type = "hidden">';
            echo '<input name = "destino_codigo" value = '.$destino_codigo.' type = "hidden">';
          ?>
          <center><button type = "submit" class = "avgbutton">LEER MÁS</button></center>
        </form>
      </div>
    <?php } } } ?>

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
<?php } ?>
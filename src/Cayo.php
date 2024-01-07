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


    <?php require_once('Conexion.php');
    $paquete_codigo = ($_POST['paquete_codigo']);
    $destino_codigo = ($_POST['destino_codigo']);
    $busqueda_destino = mysqli_query($conexion, "SELECT * FROM destino WHERE codigo = $destino_codigo");
    $busqueda_paquete = mysqli_query($conexion, "SELECT * FROM paquete WHERE codigo = $paquete_codigo"); ?>

    <!--BANNER-->
    <?php foreach($busqueda_destino as $i) {
      echo '<img style = "aspect-ratio: 16/4" src = "../img/'.$i['url'].'.png" width = "100%">'; 
    }?>

    <!--CAYOS-->
    <div class = "descripcion">
      <div class = "parrafo-descripcion">
        <img src = "../img/descripcion.png" width="500px">
        <p><?php
          foreach($busqueda_destino as $i){
            echo $i['descripcion'];
          }
        ?></p>
      </div><br>
      
      <div class = "cayos-descripcion">
      <div>
        <img src = "../img/traslado.png">
        <h4>TRASLADO</h4>
        <ul>
          <?php foreach($busqueda_paquete as $i) { echo '
            <li>Fecha: '.$i['dia_salida'].'/'.$i['mes_salida'].'/'.$i['ano_salida'].'</li>
            <li>Salida: '.$i['dia_salida'].'/'.$i['mes_salida'].'/'.$i['ano_salida'].' '. $i["hora_salida"] .':'. $i["minutos_salida"] .' horas</li>
            <li>Lugar de encuentro: Estacion Plaza Venezuela, torre la previsora</li>
            <li>Regreso: '.$i['dia_retorno'].'/'.$i['mes_retorno'].'/'.$i['ano_retorno'].', '. $i["hora_retorno"] .':'. $i["minutos_retorno"] .' horas (hasta plaza venezuela)</li>
          ';?>
        </ul>
      </div>

      <div>
        <img src = "../img/incluye.png">
        <h4>INCLUYE</h4>
        <ul>
        <?php echo '
          <li>Transporte: '.$i['transporte'].'</li>
          <li>Comidas: '.$i['comidas'].'</li>
          ';
          if ($i['fotografias'] == 1){
            echo '<li>Incluye fotografías</li>';
          }
          else if ($i['fotografias'] == 0){
            echo '<li>No incluye fotografías</li>';
          } 
        ?>
        </ul>
      </div>

      </div><br>
      <div class = "caja-registro">
        <?php echo '<p>'.$i['precio_persona'].'$ por persona</p>'; ?>
        <form name = "formulario" action = "Comprar.php" method = "POST">
          <?php
            echo '<input name = "paquete_codigo" value = '.$paquete_codigo.' type = "hidden">';
            echo '<input name = "destino_codigo" value = '.$destino_codigo.' type = "hidden">';
            echo '<input name = "precio" value = '.$i['precio_persona'].' type = "hidden">';
          } ?>
          <button class = "avgbutton boton-caja-registro" type = "submit">COMPRAR</button>
        </form>
      </div>
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
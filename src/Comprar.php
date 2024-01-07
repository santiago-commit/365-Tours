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
    
    <?php
        $paquete_codigo = ($_POST['paquete_codigo']);
        $destino_codigo = ($_POST['destino_codigo']);
        $precio = ($_POST['precio']);
    ?>

    

    <script>function confirmar(personas) {
      var precio = JSON.parse('<?php echo $precio; ?>');
      personas = document.querySelector('#input-get').value;
      var total = precio * personas;
      var respuesta = confirm("¿Seguro que deseas comprar el paquete?, serían " + total + "$");
      if (respuesta == true) { 
        return true;
      }
      else {
        return false;
      }
    }</script>

    <!--INICIO DE SESIÓN / REGISTRO-->
    <div class = "inicio-sesion">
      <div class = "form">
        <center>
          <h2 id = "iniciar_sesion">COMPRAR VIAJE</h2>
        </center>
        <form action = "ComprarAL.php" method = "POST">
          <label>MÉTODO DE PAGO <input name = "metodo" type = "text" list = "metodop" placeholder = "INGRESE SU MÉTODO DE PAGO" required></label><br>
          <datalist id = "metodop">
            <option value = "Pay-Pal">
            <option value = "Zelle">
            <option value = "Banesco">
            <option value = "Banco nacional de crédito">
            <option value = "Banco de Venezuela">
          </datalist>
          <label>CANTIDAD DE PERSONAS <input name = "personas" id = "input-get" type = "number" placeholder = "INGRESE LA CANTIDAD DE PERSONAS" required></label><br>
          <?php $personas = 3;?>
          <center>
          <button class = "avgbutton" type = "submit" onclick = "return confirmar(JSON.parse('<?php echo $personas;?>'))">ENVIAR</button>
          </center>
          <?php echo '<input name = "paquete_codigo" type = "hidden" value = '.$paquete_codigo.'>';?>
          <?php echo '<input name = "destino_codigo" type = "hidden" value = '.$destino_codigo.'>';?>
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
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
          <?php if ($_SESSION['sesion'][1] == 0) { ?>
          <li><a href = "Paquetes.php">PAQUETES</a>
            <ul>
              <li><a href = "Historial.php">HISTORIAL DE COMPRAS</a></button></li>
            </ul>
          </li>
          <?php } else if ($_SESSION['sesion'][1] == 1) { ?>
            <li><a href = "GestionUsuarios.php">GESTIÓN DE USUARIOS</a></button>
              <ul>
                <li><a href = "GestionPaquetes.php">GESTIÓN DE PAQUETES</a></button></li>
                <li><a href = "GestionDestinos.php">GESTIÓN DE DESTINOS</a></button></li>
                <li><a href = "GestionFacturas.php">GESTIÓN DE FACTURAS</a></button></li>
              </ul>
            </li>
          <?php } ?>
      </ul>
    </div>

    <?php require_once('Conexion.php');
    $paquete_codigo = ($_POST['paquete_codigo']);
    $destino_codigo = ($_POST['destino_codigo']);
    $personas = ($_POST['personas']);
    $codigo = ($_POST['factura_codigo']);
    $correo = ($_POST['correo']);
    ?>

    <!--FACTURA -->
    <?php
    $busqueda_cliente_acceso = mysqli_query($conexion, "SELECT * FROM cliente INNER JOIN acceso WHERE acceso.correo = cliente.correo AND acceso.correo = '$correo'");
    foreach($busqueda_cliente_acceso as $i){
      $cliente_acceso = $i;
    }

    $busqueda_paquete = mysqli_query($conexion, "SELECT paquete.estatus, paquete.codigo, precio_persona, nombre, dia_salida, mes_salida, ano_salida, dia_retorno, mes_retorno, ano_retorno FROM paquete INNER JOIN destino WHERE paquete.destino_codigo = destino.codigo AND paquete.codigo = $paquete_codigo");
    foreach($busqueda_paquete as $i){
      $paquete = $i;
    }

    $busqueda_factura = mysqli_query($conexion, "SELECT codigo, dia, mes, ano, estatus FROM factura WHERE codigo = $codigo");
    foreach($busqueda_factura as $i){
      $factura = $i;
    }
    ?>

    <div class = "descripcion">
      <div class = "parrafo-descripcion">
        <img src = "../img/logo-blanco.png" style = "width: 200px; padding-right: 100%">
        <p style = "font-weight: bold"><?php
          echo 'NOMBRE DE LA EMPRESA:</p><p> 365 TOURS<br></p><hr><p  style = "font-weight: bold">';
          echo 'RIF DE LA EMPRESA:</p><p> G-564738217<br></p><hr><p  style = "font-weight: bold">';
          echo 'DIRECCIÓN:</p><p> CALLE REAL DE LOS FLORES DE CATIA, CARACAS DISTRITO CAPITAL, VENEZUELA<br></p><hr><p  style = "font-weight: bold">';
          echo 'CÓDIGO POSTAL:</p><p> 1030<br></p><hr><p  style = "font-weight: bold">';
          echo 'NÚMERO DE TELÉFONO CORPORATIVO:</p><p> +58 424-1379690<br></p><hr><p  style = "font-weight: bold">';
          echo 'NOMBRE DEL CLIENTE:</p><p> '.strtoupper($cliente_acceso['primer_nombre'].' '
                                     .$cliente_acceso['segundo_nombre'].' '
                                     .$cliente_acceso['primer_apellido'].' '
                                     .$cliente_acceso['segundo_apellido'].'<br></p><hr><p style = "font-weight: bold">');
          echo 'TITULAR DE LA CÉDULA RIF:</p><p> '.$cliente_acceso['cedula_rif'].'<br></p><hr><p  style = "font-weight: bold">';
          echo 'PRECIO DEL PAQUETE:</p><p> '.$paquete['precio_persona'].'$<br></p><hr><p  style = "font-weight: bold">';
          echo 'NOMBRE DEL DESTINO:</p><p> '.strtoupper($paquete['nombre']).'<br></p><hr><p  style = "font-weight: bold">';
          echo 'FECHA DE LA COMPRA:</p><p> '.$factura['dia'].'/'.$factura['mes'].'/'.$factura['ano'].'<br></p><hr><p  style = "font-weight: bold">';
          echo 'CANTIDAD DE PERSONAS:</p><p> '.$personas.'<br></p><hr><p  style = "font-weight: bold">';
          echo 'TOTAL:</p><p> '.($personas * $paquete['precio_persona']).'$';
          if ($factura['estatus'] == 0) {
            echo '<br></p><hr><p  style = "font-weight: bold; color: red">FACTURA DESACTIVADA';
          }
          if ($paquete['estatus'] == 0) {
            echo '<br></p><hr><p  style = "font-weight: bold; color: red">PAQUETE ELIMINADO';
          }
        ?></p>
      </div><br>

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
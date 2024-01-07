<!DOCTYPE html>

<?php 
session_start();
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
          <li><a href = "#iniciar_sesion">INICIAR SESIÓN</a>
            <ul>
              <li><a href = "Registrarse.php">REGISTRARSE</a></li>
            </ul>
          </li>
      </ul>
    </div> 

    <!--BANNER-->
    <div class = "banner-container">
      <img src = "../img/banner.png" width="100%" class = "banner">
    </div>

    <!--INICIO DE SESIÓN / REGISTRO-->
    <div class = "inicio-sesion">
      <img class = "nota" src = "../img/nota.png">
      <div class = "form">
        <center>
          <h2 id = "iniciar_sesion">INICIAR SESIÓN</h2>
        </center>
        <form action = "IniciarSesionAL.php" method = "POST">
          <label>
            CORREO <input name = "correo" type = "email" placeholder = "INGRESE SU CORREO" required>
          </label><br>
          <label>
            CONTRASEÑA <input name = "contrasena" type = "password" placeholder = "INGRESE SU CONTRASEÑA" required>
          </label><br>
          <center>
            <button type = "submit" class = "avgbutton">ENVIAR</button>
          </center>
        </form>
      </div>

      <div class = "caja-registro">
        <p>¿No tienes una cuenta?<br>¡Ven a crearte una!</p>
        <a href = "Registrarse.php"><button class = "avgbutton boton-caja-registro" type = "submit">REGISTRATE</button></a>
      </div>
    </div>

    <!--SOBRE NOSOTROS-->
    <div class = "sobre-nosotros">
      <div class = "sobre-nosotros-parrafo">
        <img src = "../img/sobre_nosotros.png" class = "subtitulo">
        <p class = "parrafo">
          La agencia de turismo 365 TOURS fundada el 23 de enero de 2001 por un grupo de personas que gracias a su esfuerzo y dedicación puesta día tras día en el proyecto, se reconoce el territorio venezolano por su belleza natural abundante en sus islas y playas, y se ha conseguido mantener en un excelente estado, a pesar de las adversidades que se sufren en el país.<br><br>365 TOURS ha ofrecido durante varios años un servicio de alta calidad debido al trabajo eficiente de todos los empleados y los ejecutivos, y de las herramientas tecnológicas necesarias, métodos y técnicas efectivas para el manejo adecuado de la empresa, asimismo, en todo momento se ha tomado en cuenta la comodidad y bienestar de los usuarios que consultan o viajan con la organización.
        </p>
      </div>
      <img src = "../img/personas.png">
    </div>

    <!--MISIÓN-->
    <h2 class = "separador">MISIÓN</h2>

    <div class = "mision">
      <img src = "../img/viajero.png">
      <div class = "contenedor-parrafo-mision">
        <p class = "parrafo-mision">Ser el asesor de confianza de nuestros clientes, ofreciéndoles un extenso portafolio de productos y servicios turísticos, garantizándoles todo el respaldo antes, durante y después de su viaje
        </p>
      </div>
    </div>

    <div class = "valores">

      <img src = "../img/valores.png" class = "valores-img"><br>

      <div class = "cajita">
        <img src = "../img/disciplina.png">
        <h3>DISCIPLINA</h3>
        <p>Trabajamos fuerte e inteligentemente por y para nuestros clientes.</p>
      </div>

      <div class = "cajita">
        <img src = "../img/innovacion.png">
        <h3>INNOVACIÓN</h3>
        <p>Curiosos por ideas nuevas y experiencias que transformen el disfrute de nuestros viajeros.</p>
      </div>

      <div class = "cajita">
        <img src = "../img/crecimiento.png">
        <h3>CRECIMIENTO</h3>
        <p>Forjamos relaciones ganar-ganar para crecer con nuestros empleados, clientes, proveedores y comunidad.</p>
      </div>

      <div class = "cajita">
        <img src = "../img/integridad.png">
        <h3>INTEGRIDAD</h3>
        <p>Hacemos lo correcto, apostamos por una sociedad transparente.</p>
      </div>

      <div class = "cajita">
        <img src = "../img/mejora-continua.png">
        <h3>MEJORA CONTINUA</h3>
        <p>Siempre podemos mejorar y superarnos todos los días.</p>
      </div><br><br><br><br>

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
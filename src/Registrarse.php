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
        <li><a href = "Index.php">INICIAR SESIÓN</a>
          <ul>
            <li><a href = "#registrarse">REGISTRARSE</a></li>
          </ul>
        </li>
    </div> 

    <!--BANNER-->
    <img src = "../img/banner.png" width="100%">
    
    <!--INICIO DE SESIÓN / REGISTRO-->
    <div class = "inicio-sesion">

      <img class = "nota" src = "../img/nota.png">
        <div class = "form">
          <center>
            <h2 id = "registrarse">REGISTRARSE</h2>
          </center>
            <form action = "RegistrarseAL.php" method = "POST">
              <label>
                NOMBRE <input name = "nombre1" type = "text" placeholder = "INGRESE SU NOMBRE" required>
              </label><br>
              <label>
                SEGUNDO NOMBRE <input name = "nombre2" type = "text" placeholder = "INGRESE SU SEGUNDO NOMBRE">
              </label><br>
              <label>
                APELLIDO <input name = "apellido1" type = "text" placeholder = "INGRESE SU APELLIDO" required>
              </label><br>
              <label>
                SEGUNDO APELLIDO <input name = "apellido2" type = "text" placeholder = "INGRESE SU SEGUNDO APELLIDO">
              </label><br>
              <label>
                CÓDIGO DE ÁREA <input name = "area" type = "number" list = "area" placeholder = "INGRESE SU CÓDIGO DE ÁREA" required>
                <datalist id = "area">
                  <option value = "212">
                  <option value = "412">
                  <option value = "414">
                  <option value = "416">
                  <option value = "424">
                  <option value = "248">
                  <option value = "281">
                  <option value = "282">
                  <option value = "283">
                  <option value = "235">
                  <option value = "247">
                  <option value = "278">
                  <option value = "243">
                  <option value = "244">
                  <option value = "245">
                  <option value = "246">
                  <option value = "273">
                  <option value = "285">
                  <option value = "286">
                  <option value = "288">
                  <option value = "241">
                  <option value = "242">
                  <option value = "249">
                  <option value = "258">
                  <option value = "287">
                  <option value = "259">
                  <option value = "268">
                  <option value = "269">
                  <option value = "237">
                  <option value = "238">
                  <option value = "251">
                  <option value = "252">
                  <option value = "253">
                  <option value = "271">
                  <option value = "274">
                  <option value = "275">
                  <option value = "234">
                  <option value = "239">
                  <option value = "291">
                  <option value = "292">
                  <option value = "295">
                  <option value = "255">
                  <option value = "256">
                  <option value = "257">
                  <option value = "293">
                  <option value = "294">
                  <option value = "276">
                  <option value = "277">
                  <option value = "272">
                  <option value = "254">
                  <option value = "261">
                  <option value = "262">
                  <option value = "263">
                  <option value = "264">
                  <option value = "265">
                  <option value = "266">
                  <option value = "267">
                  <option value = "260">
                  <option value = "270">
                </datalist>
              </label><br>
              <label>
                TELÉFONO <input name = "telefono" type = "number" placeholder = "INGRESE SU TELÉFONO" required>
              </label><br>
              <label>
                CÉDULA O RIF <input name = "cedula" type = "number" placeholder = "INGRESE SU CÉDULA DE IDENTIDAD O RIF" required>
              </label><br>
              <label>
                ESTADO <input name = "estado" type = "text" list = "estado" placeholder = "INGRESE SU ESTADO" required>
                <datalist id = "estado">
                  <option value = "Amazonas">
                  <option value = "Anzoátegui">
                  <option value = "Apure">
                  <option value = "Aragua">
                  <option value = "Barinas">
                  <option value = "Bolívar">
                  <option value = "Carabobo">
                  <option value = "Cojedes">
                  <option value = "Delta Amacuro">
                  <option value = "Distrito Capital">
                  <option value = "Falcón">
                  <option value = "Guárico">
                  <option value = "La Guaira">
                  <option value = "Lara">
                  <option value = "Mérida">
                  <option value = "Miranda">
                  <option value = "Monagas">
                  <option value = "Nueva Esparta">
                  <option value = "Portuguesa">
                  <option value = "Sucre">
                  <option value = "Táchira">
                  <option value = "Trujillo">
                  <option value = "Yaracuy">
                  <option value = "Zulia">
                </datalist>
              </label><br>
              <label>
                PARROQUIA <input name = "parroquia" type = "text" placeholder = "INGRESE SU PARROQUIA" required>
              </label><br>
              <label>
                RESIDENCIA <input name = "residencia" type = "text" placeholder = "INGRESE SU RESIDENCIA" required>
              </label><br>
              <label>
                CORREO ELECTRÓNICO <input name = "correo" type = "email" placeholder = "INGRESE SU CORREO ELECTRÓNICO" required>
              </label><br>
              <label>
                CONTRASEÑA <input name = "contrasena" type = "password" placeholder = "INGRESE SU CONTRASEÑA" required>
              </label><br>
              <label>
                CONFIRME SU CONTRASEÑA <input name = "contrasenac" type = "password" placeholder = "CONFIRME SU CONTRASEÑA" required>
              </label><br>
              <center>
                <button type = "submit" class = "avgbutton">ENVIAR</button>
              </center>
            </form>
        </div>

        <div class = "caja-registro">
          <p>¿Ya tienes una cuenta?<br>¡Inicia sesión aquí!</p>
          <a href = "Index.php"><button class = "avgbutton boton-caja-registro" type = "submit">INICIA SESIÓN</button></a>
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
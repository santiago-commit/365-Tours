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

      <?php $correo = $_POST['correo']; 
      
      require_once('Conexion.php');
      $busqueda = mysqli_query($conexion, "SELECT * FROM cliente INNER JOIN acceso WHERE cliente.correo = acceso.correo AND cliente.correo = '$correo'"); 
      ?>

      <div class = "tabla_gestion">
        <table>
        <?php foreach($busqueda as $fila) { 
          echo '
            <form action = "EditarUsuarioAL.php" method = "POST">
              <input type = "hidden" name = "cedula_rif" value = "'.$fila["cedula_rif"].'">
              <input type = "hidden" name = "correo" value = "'.$fila["correo"].'">

              <tr><th style = "text-align: right">Cedula o rif</th> <td><br>'.$fila["cedula_rif"].'<br><br></td></tr>
              <tr><th style = "text-align: right">Correo</th> <td><br>'.$fila["correo"].'<br><br></td></tr>

              <tr><th style = "text-align: right">Primer nombre</th> <td><input type = "text" name = "primer_nombre" value = "'.$fila["primer_nombre"].'"></td></tr>
              <tr><th style = "text-align: right">Segundo nombre</th> <td><input type = "text" name = "segundo_nombre" value = "'.$fila["segundo_nombre"].'"></td></tr>
              <tr><th style = "text-align: right">Primer apellido</th> <td><input type = "text" name = "primer_apellido" value = "'.$fila["primer_apellido"].'"></td></tr>
              <tr><th style = "text-align: right">Segundo apellido</th> <td><input type = "text" name = "segundo_apellido" value = "'.$fila["segundo_apellido"].'"></td></tr>
              <tr><th style = "text-align: right">Codigo de área</th> <td>
              <select id = "codigo_area" name = "codigo_area">
                <option value = "'.$fila['codigo_area'].'">'.$fila['codigo_area'].'</option>
                <option value = "212">212</option>
                <option value = "412">412</option>
                <option value = "414">414</option>
                <option value = "416">416</option>
                <option value = "424">424</option>
                <option value = "248">248</option>
                <option value = "281">281</option>
                <option value = "282">282</option>
                <option value = "283">283</option>
                <option value = "235">235</option>
                <option value = "247">247</option>
                <option value = "278">278</option>
                <option value = "243">243</option>
                <option value = "244">244</option>
                <option value = "245">245</option>
                <option value = "246">246</option>
                <option value = "273">273</option>
                <option value = "285">285</option>
                <option value = "286">286</option>
                <option value = "288">288</option>
                <option value = "241">241</option>
                <option value = "242">242</option>
                <option value = "249">249</option>
                <option value = "258">258</option>
                <option value = "287">287</option>
                <option value = "259">259</option>
                <option value = "268">268</option>
                <option value = "269">269</option>
                <option value = "237">237</option>
                <option value = "238">238</option>
                <option value = "251">251</option>
                <option value = "252">252</option>
                <option value = "253">253</option>
                <option value = "271">271</option>
                <option value = "274">274</option>
                <option value = "275">275</option>
                <option value = "234">234</option>
                <option value = "239">239</option>
                <option value = "291">291</option>
                <option value = "292">292</option>
                <option value = "295">295</option>
                <option value = "255">255</option>
                <option value = "256">256</option>
                <option value = "257">257</option>
                <option value = "293">293</option>
                <option value = "294">294</option>
                <option value = "276">276</option>
                <option value = "277">277</option>
                <option value = "272">272</option>
                <option value = "254">254</option>
                <option value = "261">261</option>
                <option value = "262">262</option>
                <option value = "263">263</option>
                <option value = "264">264</option>
                <option value = "265">265</option>
                <option value = "266">266</option>
                <option value = "267">267</option>
                <option value = "260">260</option>
                <option value = "270">270</option>
              </select>
              </td></tr>
              <tr><th style = "text-align: right">Telefono</th> <td><input type = "number" name = "telefono" value = "'.$fila["telefono"].'"></td></tr>
              <tr><th style = "text-align: right">Estado</th> <td>
              <select id = "estado" name = "estado">
                <option value = "'.$fila["estado"].'">'.$fila["estado"].'</option>
                <option value = "Amazonas">Amazonas</option>
                <option value = "Anzoátegui">Anzoátegui</option>
                <option value = "Apure">Apure</option>
                <option value = "Aragua">Aragua</option>
                <option value = "Barinas">Barinas</option>
                <option value = "Bolívar">Bolívar</option>
                <option value = "Carabobo">Carabobo</option>
                <option value = "Cojedes">Cojedes</option>
                <option value = "Delta Amacuro">Delta Amacuro</option>
                <option value = "Distrito Capital">Distrito Capital</option>
                <option value = "Falcón">Falcón</option>
                <option value = "Guárico">Guárico</option>
                <option value = "La Guaira">La Guaira</option>
                <option value = "Lara">Lara</option>
                <option value = "Mérida">Mérida</option>
                <option value = "Miranda">Miranda</option>
                <option value = "Monagas">Monagas</option>
                <option value = "Nueva Esparta">Nueva Esparta</option>
                <option value = "Portuguesa">Portuguesa</option>
                <option value = "Sucre">Sucre</option>
                <option value = "Táchira">Táchira</option>
                <option value = "Trujillo">Trujillo</option>
                <option value = "Yaracuy">Yaracuy</option>
                <option value = "Zulia">Zulia</option>
              </select>
              </td></tr>
              <tr><th style = "text-align: right">Parroquia</th> <td><input type = "text" name = "parroquia" value = "'.$fila["parroquia"].'"></td></tr>
              <tr><th style = "text-align: right">Residencia</th> <td><input type = "text" name = "residencia" value = "'.$fila["residencia"].'"></td></tr>

              <tr><th style = "text-align: right">Contraseña</th> <td><input type = "text" name = "contrasena" value = "'.$fila["contrasena"].'"></td></tr>
              <tr><th style = "text-align: right">Privilegio</th> <td>';

              if ($fila['privilegio'] == 1) {
                echo '<select id = "privilegio" name = "privilegio">
                  <option value = "0">Cliente</option>
                  <option value = "1" selected>Administrador</option>
                </select>';
              }
              else {
                echo '<select id = "privilegio" name = "privilegio">
                  <option value = "0" selected>Cliente</option>
                  <option value = "1">Administrador</option>
                </select>';
              }

              echo '</td></tr>
              <input type = "hidden" name = "correo_original" value = "'.$fila["correo"].'">
              <input type = "hidden" name = "cedula_original" value = "'.$fila["cedula_rif"].'">
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
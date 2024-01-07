<?php 
session_start();

if (isset($_SESSION['sesion'])) {
  if ($_SESSION['sesion'][1] == 1) {
?>

<?php
    require_once('Conexion.php');
    $area             = 0;
    $telefono         = 0;

    $primer_nombre    = ($_POST['primer_nombre']);
    $segundo_nombre   = ($_POST['segundo_nombre']);
    $primer_apellido  = ($_POST['primer_apellido']);
    $segundo_apellido = ($_POST['segundo_apellido']);
    $area             = ($_POST['area']);
    $telefono         = ($_POST['telefono']);
    $cedula           = ($_POST['cedula']);
    $estado           = ($_POST['estado']);
    $parroquia        = ($_POST['parroquia']);
    $residencia       = ($_POST['residencia']);
    $correo           = ($_POST['correo']);
    $contrasena       = ($_POST['contrasena']);
    $contrasenac      = ($_POST['contrasena']);
    $privilegio       = ($_POST['privilegio']);

    if ($contrasena == $contrasenac) {

        $registrado = 0;

        $consulta = mysqli_query($conexion, "SELECT cedula_rif FROM cliente");

        foreach($consulta as $i) {
            if ($i['cedula_rif'] == $cedula) {
                $registrado++;
                break;
            }
        }

        $consulta = mysqli_query($conexion, "SELECT correo FROM acceso");

        foreach($consulta as $i) {
            if ($i['correo'] == $correo) {
                $registrado++;
                break;
            }
        }

        if ($registrado >= 2) {
?>          
            <script>
                alert("ERROR, DATOS YA REGISTRADAOS EN EL SISTEMA");
                window.location.href = "Registrarse.php";
            </script>
<?php
        }
        else {
            mysqli_query($conexion, "INSERT INTO cliente (cedula_rif,
                                                          correo,
                                                          primer_nombre,
                                                          segundo_nombre,
                                                          primer_apellido,
                                                          segundo_apellido,
                                                          codigo_area,
                                                          telefono,
                                                          estado,
                                                          parroquia,
                                                          residencia)
                                            VALUES ($cedula,
                                                   '$correo',
                                                   '$primer_nombre',
                                                   '$segundo_nombre',
                                                   '$primer_apellido',
                                                   '$segundo_apellido',
                                                    $area,
                                                    $telefono,
                                                   '$estado',
                                                   '$parroquia',
                                                   '$residencia')");
            
            mysqli_query($conexion, "INSERT INTO acceso (correo, contrasena) VALUES ('$correo', '$contrasena')");
?>
            <script>
                window.location.href = "GestionUsuarios.php";
            </script>
<?php
        }
    }
    else {
?>
    <script>
        alert("ERROR, LAS CONTRASEÑAS NO COINCIDEN");
        window.location.href = "Registrarse.php";
    </script>
<?php
    }
?>

<?php }
else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } 
} else { ?>
  <script>window.location.href = "Error.php"</script>
<?php } ?>
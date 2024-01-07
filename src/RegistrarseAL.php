<?php
require_once('Conexion.php');
$primer_nombre    = ($_POST['nombre1']);
$segundo_nombre   = ($_POST['nombre2']);
$primer_apellido  = ($_POST['apellido1']);
$segundo_apellido = ($_POST['apellido2']);
$area             = ($_POST['area']);
$telefono         = ($_POST['telefono']);
$cedula           = ($_POST['cedula']);
$estado           = ($_POST['estado']);
$parroquia        = ($_POST['parroquia']);
$residencia       = ($_POST['residencia']);
$correo           = ($_POST['correo']);
$contrasena       = ($_POST['contrasena']);
$contrasenac      = ($_POST['contrasenac']);

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

    if ($registrado >= 1) {
?>          
        <script>
            alert("ERROR, DATOS YA REGISTRADOS EN EL SISTEMA");
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
            window.location.href = "Index.php";
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
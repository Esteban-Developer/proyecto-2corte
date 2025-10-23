<?php
include 'conexion_be.php';

// Generando clave aleatoria
$clave = $contrasena_auto; // Esto viene de conexion_be.php

$correo = trim($_REQUEST['email']);

// Buscar usuario por email
$consulta = "SELECT * FROM users WHERE email_user = '$correo'";
$queryconsulta = mysqli_query($conexion, $consulta);
$cantidadConsulta = mysqli_num_rows($queryconsulta);
$dataConsulta = mysqli_fetch_array($queryconsulta);

if ($cantidadConsulta == 0) {
    header("Location:../index.php?errorEmail=1");
    exit();
} else {
    // Actualiza la contraseña en la base de datos
    $updateClave = "UPDATE users SET contrasena = '$clave' WHERE email_user = '$correo'";
    $queryResult = mysqli_query($conexion, $updateClave);

    // Prepara y envía el correo
    $destinatario = $correo;
    $asunto = "Recuperando Clave";
    $cuerpo = '
        <!DOCTYPE html>
        <html lang="es">
        <head>
        <title>Recuperar Clave de Usuario</title>
        <style>
        body { font-family: "Roboto", sans-serif; }
        .contenedor{ width: 80%; min-height:auto; text-align: center; margin: 0 auto; background: #ececec; border-top: 3px solid #E64A19;}
        .misection{ color: #34495e; margin: 4% 10% 2%; text-align: center; font-family: sans-serif;}
        </style>
        </head>
        <body>
        <div class="contenedor">
            <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
                <tr>
                    <td style="background-color: #ffffff;">
                        <div class="misection">
                            <h2 style="color: red; margin: 0 0 7px">Hola, ' . $dataConsulta['name_user'] . '</h2>
                            <p style="margin: 2px; font-size: 18px">Te hemos creado una nueva clave temporal para que puedas iniciar sesión. La clave temporal es: <strong>' . $clave . '</strong> </p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        </body>
        </html>';

    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: Camdrea\r\n";

    mail($destinatario, $asunto, $cuerpo, $headers);

    header("Location:../index.php?email=1");
    exit();
}
?>
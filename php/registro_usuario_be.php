<?php
    include 'conexion_be.php';
    session_start();

    $nombre = $_POST['fullName'];
    $correo = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Guardar la contraseña en texto plano para pruebas. Para producción, usa password_hash()
    //$contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // Verificar correo existente
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM users WHERE email_user='$correo'");
    if (!$verificar_correo) {
        die("Error en la consulta SQL: " . mysqli_error($conexion));
    }
    if (mysqli_num_rows($verificar_correo) > 0) {
        header("Location:../index.php?EmailRep=1");
        exit();
    }

    // Inserta nombre, correo y contraseña en los campos correctos de la tabla
    $query = "INSERT INTO users(name_user, email_user, contrasena) VALUES('$nombre', '$correo', '$contrasena')";
    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        $destinatario = $correo;
        $asunto = "Bienvenida";
        $cuerpo = '
            <!DOCTYPE html>
            <html lang="es">
            <head>
            <title>Bienvenid@</title>
            <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body { font-family: "Roboto", sans-serif; font-size: 16px; font-weight: 300; color: #888; background-color:rgba(230, 225, 225, 0.5); line-height: 30px; text-align: center; }
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
                                <h2 style="color: red; margin: 0 0 7px">Hola, ' . $nombre . '</h2>
                                <p style="margin: 2px; font-size: 18px">Bienvenid@ al sistema CRUD de auditoria.</p>
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

        header("Location:../index.php?success=1");
        exit();
    } else {
        echo "Error SQL: " . mysqli_error($conexion);
        echo '
        <script>
        alert("Inténtalo de nuevo, usuario no almacenado");
        window.location = "../index.php";
        </script>
        ';
    }

    mysqli_close($conexion);
?>
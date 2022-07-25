<?php
    include 'conexion_be.php';

    session_start();
    $fullName = $_POST['fullName'];
    $correo = $_POST['email'];
    $contrasena =  $contrasena_auto;
    echo'
    <script>
        alert($contraseña);
    </script>
    ';
    //$contrasena = hash('sha512', $contrasena);
    $info="Nombre completo: ". $nombre_completo. "\nCorreo: ". $correo. 
    "\nUsuario: ". $usuario. "\nContraseña: ". $contrasena;

    $query = "INSERT INTO users(fullName, email, contrasena, contrasena_temp)
    VALUES('$fullName', '$correo', '$contrasena', '$contrasena')";

   // $conexion = $_GET['v1'];

    //verificar correo
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM users WHERE email='$correo'");

    if(mysqli_num_rows($verificar_correo) > 0){
        header("Location:../index.php?EmailRep=1");
        exit();
    }

    $ejecutar = mysqli_query($conexion ,$query);

    if($ejecutar){
        $destinatario = $correo; 
        $asunto       = "Bienvenida";
        $cuerpo = '
            <!DOCTYPE html>
            <html lang="es">
            <head>
            <title>Bienvenid@</title>';
        $cuerpo .= ' 
        <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: "Roboto", sans-serif;
            font-size: 16px;
            font-weight: 300;
            color: #888;
            background-color:rgba(230, 225, 225, 0.5);
            line-height: 30px;
            text-align: center;
          }
        .contenedor{
            width: 80%;
            min-height:auto;
            text-align: center;
            margin: 0 auto;
            background: #ececec;
            border-top: 3px solid #E64A19;
        }
        .btnlink{
            padding:15px 30px;
            text-align:center;
            background-color:#cecece;
            color: crimson !important;
            font-weight: 600;
            text-decoration: blue;
        }
        .btnlink:hover{
         color: #fff !important;
        }
        .imgBanner{
            width:100%;
            margin-left: auto;
            margin-right: auto;
            display: block;
            padding:0px;
        }
        .misection{
            color: #34495e;
            margin: 4% 10% 2%;
            text-align: center;
            font-family: sans-serif;
        }
        .mt-5{
            margin-top:50px;
        }
        .mb-5{
            margin-bottom:50px;
        }
        </style>
';

$cuerpo .= '
</head>
<body>
    <div class="contenedor">
            <p>&nbsp;</p>
        <p>&nbsp;</p>
        <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
        <tr>
        </tr>
    
        <tr>
            <td style="background-color: #ffffff;">
                <div class="misection">
                   <h2 style="color: red; margin: 0 0 7px">Hola, '.$dataConsulta['fullName'].'</h2>
                   <p style="margin: 2px; font-size: 18px">Bienvenid@ al sistema CRUD de auditoria, te hemos creado una nueva clave temporal para que puedas iniciar sesión, la clave temporal es: <strong>'.$contrasena.'</strong> </p>
                    <p>&nbsp;</p>
               </div>
            </td>
        </tr>
        </tr>
        <tr>
       
        </tr>
    </table>'; 

    $cuerpo .= '
        </div>
        </body>
        </html>';
    
        $headers  = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
        $headers .= "From: Camdrea\r\n"; 
        $headers .= "Reply-To: "; 
        $headers .= "Return-path:"; 
        $headers .= "Cc:"; 
        $headers .= "Bcc:"; 
        (mail($destinatario,$asunto,$cuerpo,$headers));

        header("Location:../index.php");
        exit();
    }else{
        echo '
        <script>
        alert("Inténtalo de nuevo, usuario no almacenado");
        window.location = "../index.php";
        </script>
        ';
    }

    mysqli_close($conexion)

?>



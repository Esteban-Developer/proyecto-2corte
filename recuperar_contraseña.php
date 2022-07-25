
<!DOCTYPE html>
<html lang="en">
<head>
<title>Restablecer contraseña</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Login 01</title>
    <link rel="stylesheet" href="assets/css/master.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

</head>

<body>
    <form action="php/recuperarClave.php" method="POST" class="form-box animated fadeInUp">
        <h1 class="form-title">Restablecer la contraseña</h1>
        <p class="form-texto">Ingresa tu correo para buscar tu cuenta</p>
        <input type="text" placeholder="Correo Electronico" name="email" required autocomplete="off"/>
        <button type="submit">Recuperar contraseña</button>
        <a href="index.php" id="volver" title="volverInicio" style="color:#FFFFFF;">Volver</a>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Login 01</title>
    <link rel="stylesheet" href="assets/css/master.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

</head>

<body>
    <form action="php/cerrar_sesion.php" method="POST" class="form-box animated fadeInUp">
        <h1 class="form-title">Actualizar contraseña</h1>
        <p class="form-texto">Debe actualizar la contraseña porque se trata de la primera vez que inicia sesión
        o porque la contraseña expiró</p>
        <input type="password" placeholder="Contraseña actual" name="contrasena_actual" autofocus required autocomplete="off"/>
        <input type="password" placeholder="Nueva contraseña" name="nueva_contrasena" autofocus required autocomplete="off"/>
        <input type="password" placeholder="Confirmar contraseña" name="conf_contrasena" autofocus required autocomplete="off"/>
        <button type="submit"> Actualizar </button>
        <a href="index.php" id="volverIni" title="volverInicio" style="color:#FFFFFF;">Volver</a>
    </form>
</body>
</html>
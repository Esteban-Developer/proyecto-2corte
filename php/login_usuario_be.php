<?php
    session_start();
    include 'conexion_be.php';

    $correo = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Consulta usando los nombres correctos
    $sql = "SELECT * FROM users WHERE email_user='$correo' AND contrasena='$contrasena'";
    $result = mysqli_query($conexion, $sql);

    if (!$result) {
        die("Error en la consulta SQL: " . mysqli_error($conexion));
    }

    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $_SESSION['usuario'] = $correo;
        header("location: ../crud/index1.php");
        exit;
    } else {
        // Usuario no encontrado o contraseña incorrecta
        header("location: ../index.php?loginError=1");
        exit;
    }
?>
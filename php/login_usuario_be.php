<?php
    session_start();

    include 'conexion_be.php';
    $correo 		= $_REQUEST['email'];
    $clave  		= $_REQUEST['contrasena'];

    $validar_login = mysqli_query($conexion, "SELECT * FROM  users WHERE email='$correo' and contrasena='$clave'");
    $sqlVerificando = ("SELECT contrasena_temp FROM users WHERE contrasena ='".$clave."'");
    $QueryResul = mysqli_query($conexion,$sqlVerificando);

if ($row = mysqli_fetch_assoc($QueryResul)) {
	 $_SESSION['contrasena_temp']	= $row['contrasena_temp'];
     $_SESSION['usuario']=$correo;//posible error
}
    if($row['contrasena_temp'] == $clave){
        echo '<meta http-equiv="refresh" content="0;url=../nueva_contraseña.php">';
    }else{
        if(mysqli_num_rows($validar_login) > 0){
            $_SESSION['usuario']=$correo;
            header("location: ../crud/index1.php");
            exit;
        }else{
            echo '<meta http-equiv="refresh" content="0;url=../index.php?emaiIncorrecto=1">';
            exit;
        }
    }	


?>
<?php
    $conexion = mysqli_connect("localhost", "root", "", "login_usr");
    function password_random($length = 8){
        $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!#$%&/()";
        $password = "";
        for($i=0;$i<10;$i++){
            $rand = rand() % strlen($charset);
            $password .= substr($charset, $rand, 1);
        }
        return $password;
    }

    $contrasena_auto = password_random(10);
?>
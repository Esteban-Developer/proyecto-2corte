<?php
$host = getenv("DB_HOST") ?: "db";
$user = getenv("DB_USER") ?: "root";
$pass = getenv("DB_PASSWORD") ?: "yes";
$db   = getenv("DB_NAME") ?: "crud";

$retries = 10;
while ($retries > 0) {
    $conexion = @mysqli_connect($host, $user, $pass, $db);
    if ($conexion) break;
    $retries--;
    echo "Esperando conexión con MySQL...\n";
    sleep(3);
}

if (!$conexion) {
    die("Error: No se pudo conectar a MySQL después de varios intentos.");
}

function password_random($length = 8){
    $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!#$%&/()";
    $password = "";
    for($i=0;$i<$length;$i++){
        $rand = rand() % strlen($charset);
        $password .= substr($charset, $rand, 1);
    }
    return $password;
}

$contrasena_auto = password_random(10);
?>

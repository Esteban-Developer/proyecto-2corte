<?php

class db {
    protected function connect() {
        // Detectar
        $host = getenv("DB_HOST") ?: "db";
        $dbname = getenv("DB_NAME") ?: "crud";
        $user = getenv("DB_USER") ?: "root";
        $pass = getenv("DB_PASSWORD") ?: "yes";

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        $maxRetries = 10; // reintentos para esperar que MySQL arranque
        while ($maxRetries-- > 0) {
            try {
                $connect = new PDO($dsn, $user, $pass);
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $connect;
            } catch (PDOException $e) {
                echo "Esperando conexión con MySQL...\n";
                sleep(2);
            }
        }

        // Si después de varios intentos no logra conectar, muestra error
        die("Error db(connect): " . $e->getMessage());
    }
}
?>

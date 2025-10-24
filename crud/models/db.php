<?php

class db {
    protected function connect() {
        $host = getenv("DB_HOST") ?: "db";
        $dbname = getenv("DB_NAME") ?: "crud";
        $user = getenv("DB_USER") ?: "root";
        $pass = getenv("DB_PASSWORD") ?: "yes";

        // Se agrega el puerto y desactivamos SSL para evitar el error de certificado
        $dsn = "mysql:host=$host;port=3306;dbname=$dbname;charset=utf8mb4";

        $maxRetries = 10;
        while ($maxRetries-- > 0) {
            try {
                $connect = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
                    PDO::MYSQL_ATTR_SSL_CA => null,
                ]);
                return $connect;
            } catch (PDOException $e) {
                echo "Esperando conexión con MySQL...\n";
                sleep(2);
            }
        }

        die("Error db(connect): " . $e->getMessage());
    }
}
?>

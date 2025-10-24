<?php

class db {
    protected function connect() {
        $host = getenv("DB_HOST") ?: "db";
        $dbname = getenv("DB_NAME") ?: "crud";
        $user = getenv("DB_USER") ?: "root";
        $pass = getenv("DB_PASSWORD") ?: "yes";

        // Forzar la conexión sin SSL
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
            PDO::MYSQL_ATTR_SSL_CA => null,
        ];

        $maxRetries = 10;
        while ($maxRetries-- > 0) {
            try {
                $connect = new PDO($dsn, $user, $pass, $options);
                return $connect;
            } catch (PDOException $e) {
                echo "Esperando conexión con MySQL...<br>";
                sleep(2);
            }
        }

        die("Error db(connect): " . $e->getMessage());
    }
}
?>

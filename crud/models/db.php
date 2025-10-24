<?php
class db {
    protected function connect() {
        $host = getenv("DB_HOST") ?: "db";
        $dbname = getenv("DB_NAME") ?: "crud";
        $user = getenv("DB_USER") ?: "root";
        $pass = getenv("DB_PASSWORD") ?: "yes";

        // OJO: agrega port=3306 explícito y el protocolo TCP
        $dsn = "mysql:host=$host;port=3306;dbname=$dbname;charset=utf8mb4";

        try {
            // fuerza conexión por TCP
            $connect = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
            ]);
            return $connect;
        } catch (PDOException $e) {
            die("Error db(connect): " . $e->getMessage());
        }
    }
}
?>

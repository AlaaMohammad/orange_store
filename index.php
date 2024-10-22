<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/bootstrap/app.php';

if (array_key_exists($_SERVER['REQUEST_URI'], $routes)) {
    require $routes[$_SERVER['REQUEST_URI']];
} else {
    require 'views/404.php';
}

class Database
{
    public static function connect()
    {
        $host = $_ENV['DB_SERVER'];
        $db = $_ENV['DB_DATABASE'];
        $user = $_ENV['DB_USERNAME'];
        $pass = $_ENV['DB_PASSWORD'];
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            return new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function query($query)
    {
        $pdo = self::connect();
       // excute the query
        $stmt = $pdo->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

}



$pdo = Database::connect();

//$id = $_GET['id'];
//$query  = "SELECT * FROM products WHERE id=$id;";
//$products = Database::query($query);




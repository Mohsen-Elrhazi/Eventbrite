<?php
namespace Config;

require_once __DIR__ . '/../vendor/autoload.php';

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database {
    private static $conn;

    public static function getConnection() {
        if (self::$conn) {
            return self::$conn;
        } else {
            try {
                $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
                $dotenv->load();

                
                $host = $_ENV['DB_HOST'];
                $port = $_ENV['DB_PORT'];
                $db_name = $_ENV['DB_DATABASE'];
                $username = $_ENV['DB_USERNAME'];
                $password = $_ENV['DB_PASSWORD'];

                self::$conn = new PDO("pgsql:host=$host;port=$port;dbname=$db_name", $username, $password);
                 
                // echo "connection etablie";
                return self::$conn;
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
    }
}

Database::getConnection();
?>
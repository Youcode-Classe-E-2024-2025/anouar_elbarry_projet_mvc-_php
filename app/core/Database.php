<?php
namespace App\Core;

use PDO;
use PDOException;

class Database {
    private $connection;
    private $host = "localhost";
    private $username = "postgres";
    private $dbname = "mvc";
    private $password = "jppp5734";

    public function __construct($host, $dbname, $username, $password) {
        try {
            $dsn = "pgsql:host=$host;dbname=$dbname";
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query($sql, $params = []) {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch(PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
}

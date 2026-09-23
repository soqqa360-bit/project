<?php

namespace App\Services;
use PDO;
use PDOException;

class PdoService
{
    /**
     * Create a new class instance.
     */
    private PDO $pdo;
    public function __construct()
    {
        $host = config('database.connections.mysql.host');
        $port = config('database.connections.mysql.port');
        $database = config('database.connections.mysql.database');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');

        $dsn = "mysql:host=$host;port=$port;dbname=$database";

        try {
            // Instantiate the PDO instance and assign it to the property
            $this->pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            // Handle connection failures (or let Laravel's handler catch it)
            throw new PDOException("Database connection failed: " . $e->getMessage());
        }
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }
}

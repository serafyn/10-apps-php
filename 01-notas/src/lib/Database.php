<?php

namespace Vidamrr\Notas\lib;

use PDO;
use PDOException;

class Database
{

    private string $host;
    private string $db;
    private string $user;
    private string $pass;
    private string $charset;
    public function __construct()
    {
        $this->host = 'localhost';
        $this->db = 'appnotas';
        $this->user = 'root';
        $this->pass = '';
        $this->charset = 'utf8mb4';
    }

    public function connect()
    {
        try {
            $conection = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conection, $this->user, $this->pass, $options);
            return $pdo;
        } catch (PDOException $th) {
            throw $th;
        }
    }
}

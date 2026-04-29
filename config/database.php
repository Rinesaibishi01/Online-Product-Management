<?php

class Database {
    private $host = "localhost";
    private $db_name = "projekti";
    private $username = "root";
    private $password = "";
    public $conn;

    public function lidhja() {
        $this->conn = null;

        try {
            // Shtova utf8 që të mos kesh probleme me shkronjat shqipe në DB
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8",
                $this->username,
                $this->password
            );

           
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch(PDOException $exception) {
            echo "Gabim në lidhje: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
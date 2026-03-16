<?php

class Database{

private $host = "localhost";
private $db_name = "projekti";
private $username = "root";
private $password = "";

public $lidhja;

public function lidhja(){

$this->lidhja = null;

try{

$this->lidhja = new PDO(
"mysql:host=" . $this->host . ";dbname=" . $this->db_name,
$this->username,
$this->password
);

$this->lidhja->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $exception){
echo "Gabim në lidhje: " . $exception->getMessage();
}

return $this->lidhja;

}

}
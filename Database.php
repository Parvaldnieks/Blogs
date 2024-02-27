<?php

class Database {
    
    private $pdo;

    public function __construct() {
      $connection_string = "mysql:host=localhost;dbname=blog_strikaitis;user=root;password=;charset=utf8mb4";
      $this->pdo = new PDO($connection_string);
      $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }


public function execute($que_string) {
$que = $this->pdo->prepare($que_string);
$que->execute();
return $que;
    }
}

?>
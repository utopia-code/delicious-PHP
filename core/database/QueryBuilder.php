<?php

class QueryBuilder {

  protected $pdo;

  public function __construct($pdo) {
    $this->pdo = $pdo;
  }

  public function selectAll($table) {
    $statement = $this->pdo->prepare("select * from {$table}");

    $statement->execute();
    
    return $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function selectByPage($table, $startIndex, $limit) {
    $query = "SELECT * FROM $table LIMIT $startIndex, $limit";

    $statement = $this->pdo->prepare($query);

    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectById($table, $id) {
    $query = "SELECT * FROM $table WHERE id = :id";

    $statement = $this->pdo->prepare($query);

    $statement->bindParam(':id', $id);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  public function selectByUsername($table, $username) {
    
    $query = "SELECT * FROM $table WHERE username = :username";

    $statement = $this->pdo->prepare($query);

    $statement->bindParam(':username', $username);

    $statement->execute();

    return $statement->fetch(PDO::FETCH_OBJ);
  }
  
}
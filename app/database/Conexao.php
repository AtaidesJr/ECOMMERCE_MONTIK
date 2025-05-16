<?php

namespace app\database;

use PDO;
use PDOException;

class Conexao
{
  private $host     = "localhost";
  private $dbname   = "ecommerce_montik";
  private $user     = "root";
  private $password = "Tecno@2024";

  public function conectar()
  {
    try {
      $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (PDOException $e) {
      echo "Erro na conexão ao banco de dados: " . $e->getMessage();
    }
  }
}

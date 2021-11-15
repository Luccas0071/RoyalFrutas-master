<?php

class Database {

  private $host='eunelson-db';
  private $user='root';
  private $password='erik';
  private $database='projeto_integrador';
  private $port='3306';

  public function __construct() {
        
    //Fonte de dados contem as informaçoes necessarias para conectar ao banco de dados.
    $dsn = 'mysql:host='.$this-> host. ';port='.$this->port.';dbname'.$this->database;

    $opcoes = [
      //Armazena em cache a conexão para ser reutilizada, evita a sobrecarga de uma nova conexão, resultando em um aplicação mais rapida
      PDO:: ATTR_PERSISTENT => true,
      //lança uma PDOException se ocorrer um erro
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    try {
      //Aqui cria a instancia do PDO
      $this->dbh = new PDO($dsn, $this->user, $this->password, $opcoes);
    }catch(PDOException $e) {
      print "Error:" .$e->getMessage() . "<br/>";
      die();
    }
  }
}

?>
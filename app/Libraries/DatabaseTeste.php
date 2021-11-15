<?php

class Database {
  

  private $host= 'localhost';
  private $user= 'root';
  private $password= "";
  private $database= "controleacademico";
  private $port= '3306';
  private $dbh;
  private $stmt;

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

  public function query($sql){
    $this->stmt = $this->dbh->prepare($sql);
  }

  public function bind($parametro, $valor, $tipo = null){
    if(is_null($tipo)){
      switch (true){
        case is_null($valor):
          $tipo = PDO::PARAM_INT;
        break;

        case is_bool($valor):
          $tipo = PDO::PARAM_BOOL;
        break;

        case is_bool($valor):
          $tipo = PDO::PARAM_NULL;
        break;

        default:
        $tipo = PDO::PARAM_STR;
      } 
    }
    $this->stmt->bindValue($parametro, $valor, $tipo);
  }

  public function executa(){
    return $this->stmt->execute();
  }

  public function resultado(){
    $this->executa();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  public function resultados(){
    $this->executa();
    return $this->stmt->fetchALL(PDO::FETCH_OBJ);
  }

  public function totalResultados(){
    return $this->stmt->rowCount();
  }

  public function ultimoIdInserido(){
    return $this->dbh->lastInsertId();
  }

}

?>

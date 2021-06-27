<?php

class Sql extends PDO {

    private $conn;
    private $banco;
    private $servidor;
    private $database;
    private $usuario;
    private $password;
    private $cnx;

    public function __construct() {

//        $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "root");

        $this->cnx = new Cnx();

        $this->banco    = $this->cnx->getBanco()    ;
        $this->servidor = $this->cnx->getServidor() ;
        $this->database = $this->cnx->getDatabase() ;
        $this->usuario  = $this->cnx->getUsuario()  ;
        $this->password = $this->cnx->getPassword() ;
          
        $this->conn = new PDO( $this->banco.$this->servidor.$this->database, $this->usuario, $this->password);

    }
//--------------------------------------------------
    private function setParams($statement, $parameters = array()) {

        foreach ($parameters as $key => $value) {
            $this->setParam($statement,$key, $value);
        }

    }
//--------------------------------------------------
    private function setParam($statement, $key, $value){
        $statement->bindParam($key, $value);
    }
//--------------------------------------------------
    public function query($rawQuery, $params = array()) {
        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt;
    }
//--------------------------------------------------
    public function select($rawQuery, $params = array()):array
    {
        $stmt = $this->query($rawQuery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
//--------------------------------------------------
}

?>
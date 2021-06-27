<?php 


class Cnx{

	private $banco;
    private $servidor;
    private $database;
    private $usuario;
    private $password;

    public function __construct() {
		$this->banco = "mysql:";
	    $this->servidor = "host=127.0.0.1;";
	    $this->database ="dbname=dbphp7";
	    $this->usuario = "root";
	    $this->password = "";
	}
//--------------------------------------------------
    public function setBanco($value){
    	$this->banco = $value;
    }
    public function getBanco(){
    	return $this->banco;
    }
//--------------------------------------------------
    public function setServidor($value){
    	$this->servidor = $value;
    }
    public function getServidor(){
		return  $this->servidor  ;
    }
//--------------------------------------------------
    public function setDatabase($value){
    	$this->database = $value;
    }
    public function getDatabase(){
		return  $this->database  ;
    }
//--------------------------------------------------
    public function setUsuario($value){
    	$this->usuario = $value;
    }
    public function getUsuario(){
		return  $this->usuario  ;
    }
//--------------------------------------------------

    public function setPassword($value){
    	$this->password = $value;
    }
    public function getPassword(){
		return  $this->password ;
    }
//--------------------------------------------------



}


 ?>
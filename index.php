<?php 
require_once("config.php");
/*
$sql = new Sql();

$usuarios = $sql->select("SELECT * FROM tb_usuarios"); 

echo json_encode($usuarios);
*/
/*
$root = new Usuario();
$root->loadById(1);
echo $root;
*/

//$lista = json_encode( Usuario::getList() );
//echo $lista;

//echo json_encode( Usuario::search("") );

$usu = new Usuario();
$usu->login("mario","123456");
echo $usu ;
?>
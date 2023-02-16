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
/*
$usu = new Usuario();
$usu->login("mario","123456");
echo $usu ;
*/
/* aula 66 INSERT 
$aluno = new Usuario();
$aluno->setDeslogin("nico");
$aluno->setDessenha("@123");
$aluno->Insert();
echo $aluno;
*/

$usuario = new Usuario();

echo 'load'.'<br>';
$usuario->loadById(2);

echo $usuario.'<br>';

echo 'update'.'<br>';
$usuario->Update('santos FC','campeao');

echo $usuario.'<br>';

?>
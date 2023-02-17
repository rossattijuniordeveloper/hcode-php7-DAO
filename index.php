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
/* aula 66 INSERT /
$aluno = new Usuario();
$aluno->setDeslogin("jurandir");
$aluno->setDessenha($aluno->getDeslogin()."@123");
//$aluno->setDtcadastro();
$aluno->Insert();
echo $aluno;
*/
/* aulas 67,68 insert e update
$usuario = new Usuario();

echo 'load'.'<br>';
$usuario->loadById(2);

echo $usuario.'<br>';

echo 'update'.'<br>';
$usuario->Update('santos FC','campeao');

echo $usuario.'<br>';
*/
/* aula 69 delete
$usuario = new Usuario();
echo json_encode( $usuario->getList()).'<br>';

$usuario->loadById(2);

$usuario->delete();

echo json_encode( $usuario->getList());
*/


?>
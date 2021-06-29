<?php

require_once("config.php");


/*
// aula 65 exemplo de carregar o usuario por id
$root = new Usuario();
$root->loadById(1);
echo $root;

*/

/*
//
//echo "<h1>  Aula 66 - DAO LIST => exemplo de carregar uma lista de usuarios </h1>";
//
$sql = new Sql();
$usuarios = $sql->select("SELECT * FROM tb_usuarios");
echo json_encode($usuarios);
*/

/*
//
// Aula 66 - DAO LIST => exemplo de carregar uma lista de usuarios usando um metodo de uma classe sem preciar instanciar o Objeto.
//
//$lista = Usuario::getList();
//echo json_encode($lista);

//
// Aula 66 - DAO LIST => exemplo de buscar uma lista de usuarios usando um metodo de uma classe , usando o campo deslogin
//
$search = Usuario::search("jo");
echo json_encode($search);
*/

/*
//
// Aula 66 - DAO LIST => carega o usuario usando login e a senha
//
$usuario = new Usuario();
$usuario->login("jose","123456");
echo $usuario;
*/
//
// Aula 67 - DAO INSERT => inserir um usuario;
//
// 1a. forma 
/*
$aluno = new Usuario();
$aluno->setDeslogin("aluno");
$aluno->setDessenha("@lun0");
*/
//2a forma
/*
$aluno = new Usuario("alunX","@lunX");
$aluno->insert();
echo $aluno;
*/
//
// Aula 68 - DAO UPDATE => atualizar um usuario;
//
$usuario = new Usuario();
$usuario->loadById(9);
$usuario->update( "professor","123456");
echo $usuario;








?>
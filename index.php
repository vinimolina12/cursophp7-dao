<?php 
require_once("config.php");

$root = new Usuario();
$root->loadById(3);




$lista = Usuario::getList();


//$search = Usuario::search("akashi");
//echo json_encode($search); 
/*
$busca = new Usuario();
$busca->buscar("bielakashi", "123321");
echo json_encode($busca);

$aluno = new Usuario();
$aluno->setDeslogin("aluno");
$aluno->setDessenha("0102030405");
$aluno->insert();

echo $aluno;
*/


$novousuario = new Usuario();

$novousuario->loadById(3);

//echo $novousuario;

$novousuario->delete();

echo $novousuario;






 ?>
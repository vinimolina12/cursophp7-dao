<?php 
require_once("config.php");

$root = new Usuario();
$root->loadById(3);




$lista = Usuario::getList();


//$search = Usuario::search("akashi");
//echo json_encode($search); 

$busca = new Usuario();
$busca->buscar("bielakashi", "123321");
echo $busca;





 ?>
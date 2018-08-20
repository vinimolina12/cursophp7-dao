<?php 

  class Usuario {

      private $idusuario;
      private $deslogin;
      private $dessenha;
      private $dtcadastro;


      public function getIdusuario(){
        return $this->idusuario;
      }
      public function getDeslogin(){
        return $this->deslogin;
      }
      public function getDessenha(){
        return $this->dessenha;
      }
      public function getDtCadastro(){
        return $this->dtcadastro;
      }



      public function setIdusuario($value){
      	 $this->idusuario = $value;
      }
      public function setDeslogin($value){
      	 $this->deslogin = $value;
      }
      public function setDessenha($value){
      	 $this->dessenha = $value;
      }
      public function setDtCadastro($value){
      	 $this->dtcadastro = $value;
      }


      public function loadById($id){

      	$sql = new Sql();

      	$result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = ':ID", array(
      	    ":ID"=>$id));
      }

  }


 ?>
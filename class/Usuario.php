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

      	$result = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
      	    ":ID"=>$id));

      	if(count($result) > 0){

      		
      		$this->setData($result[0]);
      	}
      }






     //MÉTODO DE BUSCA DE DADOS!
     public static function search($login){
       
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
           ":SEARCH"=>"%".$login."%"));

     }







     //METODO DE BUSCA POR AUTENTICAÇÃO
    public function buscar($login, $senha){
        
         $sql = new Sql();

         $result = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :SENHA ORDER BY deslogin", array (
          ":LOGIN"=>$login,
          ":SENHA"=>$senha));

         if(count($result) > 0){

        	$this->setData($result[0]);


      	}else{

      		throw new Exception ("Login e/ou senha inválidos.");
      	}


     }



      //LISTA COM TODOS OS REGISTROS DO BANCO DE DADOS
      public static function getList(){

         $sql = new Sql();
         return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");


      }




      //PASSANDO OS DADOS COMO STRING JSONENCODE
      public function __toString(){
        
      	return json_encode(array(
           "idusuario"=>$this->getIdusuario(),
           "deslogin"=>$this->getDeslogin(),
           "dessenha"=>$this->getDessenha(),
           "dtcadastro"=>$this->getDtCadastro()->format("d-m-Y H:i:s")

      	));
       

      }
          


      public function setData($data){

            $this->setIdusuario($data['idusuario']);
      		$this->setDeslogin($data['deslogin']);
      		$this->setDessenha($data['dessenha']);
      		$this->setDtCadastro(new DateTime($data['dtcadastro']));

      } 



      public function insert(){

      	$sql = new Sql();

      	$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
      	     ":LOGIN"=>$this->getDeslogin(),
      	     ":PASSWORD"=>$this->getDessenha()
      	 ));

      	if(count($results) > 0){
      		 $this->setData($results[0]);
      	}
      } 



      public function update($login, $senha){

      	$this->setDeslogin($login);
      	$this->setDessenha($senha);

      	$sql = new Sql();

      	$sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID",
         array(
           ":LOGIN"=>$this->getDeslogin(),
           ":PASSWORD"=>$this->getDessenha(),
           ":ID"=>$this->getIdusuario()

         ));
      }


      public function delete(){

      	$sql = new Sql();

      	$sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(

          ":ID"=>$this->getIdusuario()

      	  ));


      	$this->setIdusuario(0);
      	$this->setDeslogin("");
      	$this->setDessenha("");
      	$this->setDtCadastro(new DateTime());
      }



    
    
  }


 ?>
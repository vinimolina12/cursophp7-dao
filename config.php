<?php 

spl_autoload_register(function ($class_name){
    $ext = ".php";
    $filename = "class".DIRECTORY_SEPARATOR.$class_name.$ext;
	if(file_exists($filename)){
   
     require_once($filename);

	}
                            
});


 ?>
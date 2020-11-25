<?php
require "Core/Router.class.php";
	

$slug = mb_strtolower($_SERVER["REQUEST_URI"]);

$route = new Router($slug);
$c = $route->getController();
$a = $route->getAction();



if( file_exists("./Controllers/".$c.".class.php") ){

	include "./Controllers/".$c.".class.php";
	if( class_exists($c)){
		
		// $c = UserController
		$cObject = new $c();

		if(method_exists($cObject, $a)){

			//$a => addAction
			$cObject->$a();
			
		}else{
			show404();
		}

	}else{
		show404();
	}


}else if(file_exists("./Controllers/GlobalController.class.php")){
	show404();
}else{
	die("Error !!!");
}



function show404(){
	include "./Controllers/GlobalController.class.php";
	$cObject = new GlobalController();
	$cObject->page404Action();
}




<?php


function myAutoloader($class){
	if(file_exists("Core/".$class.".class.php")){
		include "Core/".$class.".class.php";
	}
}

spl_autoload_register("myAutoloader");

//On récupère le slug dans la super globale SERVER
//On le transforme en minuscule
$slug = mb_strtolower($_SERVER["REQUEST_URI"]);

//Instance de la classe router (dossier CORE) avec en paramètre la slug
$route = new Router($slug);
//On récupère le controller et l'action correspond au slug
$c = $route->getController();
$a = $route->getAction();


//vérification que le fichier du controller existe
if( file_exists("./Controllers/".$c.".class.php") ){

	//include car on vérifie avant l'existance du fichier et surtout
	//le include est plus rapide à executer
	include "./Controllers/".$c.".class.php";

	//Le fichie existe mais est-ce que la classe existe ?
	if( class_exists($c)){
		
		// $c = UserController
		// Instance de la classe : la classe dépend du fichier routes.yml qui lui dépend  du slug
		$cObject = new $c();
		//Est-ce que la méthode existe dans l'objet
		if(method_exists($cObject, $a)){

			//$a => addAction
			//Appel de la méthode dans l'objet, exemple UserController->addAction();
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




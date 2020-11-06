<?php
	$slug = mb_strtolower(trim($_SERVER["REQUEST_URI"],"/"));

	$slugExploded = explode("/", $slug);


/*
	Controller Global => default , page404
	Controller User => default, add

	/user => Controller User avec l'action default
	/user/add => Controller User avec l'action add
	/user/edit => Controller Global avec l'action page404

	/ => Controller Global avec l'action default

	Tout le reste	=> Controller Global avec l'action page404	
*/


	$c = ((empty($slugExploded[0]))?"global":$slugExploded[0])."Controller";

	$a = ($slugExploded[1]??"default")."Action";

/*
 Vérifier :
	- Est-ce qu'il y un fichier du nom de $c
	- Est-ce qu'il y a une classe du nom de $c
	- Est-ce qu'il y a une methode du nom de $a
	-> Si oui appeler la méthode
	-> Sinon appeler la méthode global 404
*/



if( file_exists("./Controllers/".$c.".class.php") ){

	echo "OK";

}else if(file_exists("./Controllers/GlobalController.class.php")){
	
	include "./Controllers/GlobalController.class.php";
	$cObject = new GlobalController();
	$cObject->page404Action();

}else{
	die("Error !!!");
}







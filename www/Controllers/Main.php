<?php
//Parse error: syntax error, unexpected 'Global' (T_GLOBAL), expecting identifier (T_STRING) in /var/www/html/Controllers/Global.php on line 3

namespace App\Controller;

use App\Core\View;


class Main
{

	//Method : Action
	public function defaultAction(){

		$pseudo = "Prof"; // Depuis la bdd

		//Affiche la vue home intégrée dans le template du front
		$view = new View("home"); 
		$view->assign("pseudo", $pseudo);

	}

	//Method : Action
	public function page404Action(){
		
		//Affiche la vue 404 intégrée dans le template du front
		$view = new View("404"); 
	}
	



}
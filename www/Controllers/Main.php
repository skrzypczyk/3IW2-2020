<?php
//Parse error: syntax error, unexpected 'Global' (T_GLOBAL), expecting identifier (T_STRING) in /var/www/html/Controllers/Global.php on line 3

namespace App\Controller;

class Main
{

	//Method : Action
	public function defaultAction(){
		echo "Main default";
	}

	//Method : Action
	public function page404Action(){
		echo "PAGE 404";
	}
	



}
<?php
//Fichier 1  Controllers/security.php

namespace App\Controller;

class Security(){

}


------------------------------------------------------------

//Fichier 2  Core/security.php

namespace App\Core;

class Security(){
	
}


------------------------------------------------------------

//Fichier 3  index.php

namespace App\test;

use App\Core\Security as secu;

require "Core/security.php";
require "Controller/security.php";

new secu(); // App\test\Core\Security
new Security();








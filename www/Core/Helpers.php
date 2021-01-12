<?php
namespace App\Core;


class Helpers{


	public static function populateEnv(){
		
		putenv("DBHOST=database");


		if(file_exists(".env")){
			//Ouvrir le fichier .env
			//parcourir ligne par ligne
			//executer putenv();

			$handle = fopen('.env', 'r');
			if ($handle)
			{
				/*Tant que l'on est pas à la fin du fichier*/
				while (!feof($handle))
				{
					/*On lit la ligne courante*/
					$buffer = fgets($handle);
					/*On l'affiche*/
					putenv($buffer);
				}
				/*On ferme le fichier*/
				fclose($handle);
			}

		}else{
			die("Il manque le .env");
		}
	}



	public static function cleanFirstname($firstname){
		return ucwords(mb_strtolower(trim($firstname)));
	}

}
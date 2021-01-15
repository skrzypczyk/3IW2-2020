<?php
namespace App\Core;


class Database{

	private $pdo;
	private $table;

	public function __construct(){
		try{
			$this->pdo = new \PDO( DBDRIVER.":host=".DBHOST.";dbname=".DBNAME.";port=".DBPORT , DBUSER , DBPWD );
		}catch(Exception $e){
			die("Erreur SQL : ".$e->getMessage());
		}

	 	//  jclm_   App\Models\User -> jclm_User
	 	$classExploded = explode("\\", get_called_class());
		$this->table = DBPREFIXE.end($classExploded); //jclm_User
	}


	public function save(){

		//INSERT OU UPDATE

		print_r(get_object_vars($this)); 
		//Array ( [firstname] => Yves [lastname] => SKRZYPCZYK [email] => y.skrzypczyk@gmail.com [pwd] => Test1234 [country] => fr [role] => 0 [status] => 1 [isDeleted] => 0 [pdo] => PDO Object ( ) [table] => jclm_User )

		print_r(get_class_vars(get_class()));
		//Array ( [pdo] => [table] => )



		if( is_null($this->getId()) ){
			//INSERT

			$query = $this->pdo->prepare("INSERT INTO ".$this->table." (firstname, lastname) 
						VALUES ( :firstname , :lastname )"); //1 
			
		}else{
			//UPDATE
			
		}


		$query->execute( );

	}

}
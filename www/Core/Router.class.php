<?php
class Router{

	public $slug;
	public $action;
	public $controller;
	public $routePath = "routes.yml";
	public $listOfRoutes = [];


	public function __construct($slug){
		$this->slug = $slug;

	}

	public function setController(){
		
	}

	public function setAction(){

	}


	public function getController(){
		
	}

	public function getAction(){

	}

}
<?php
class Router{

	private $slug;
	private $action;
	private $controller;
	private $routePath = "routes.yml";
	private $listOfRoutes = [];


	public function __construct($slug){
		$this->slug = $slug;
		$this->loadYaml();

		if(empty($this->listOfRoutes[$this->slug])) $this->exception404();

		$this->setController($this->listOfRoutes[$this->slug]["controller"]);
		$this->setAction($this->listOfRoutes[$this->slug]["action"]);
	}


	public function loadYaml(){
		$this->listOfRoutes = yaml_parse_file($this->routePath);
		foreach ($this->listOfRoutes as $route) {
			if(empty($route["controller"]) || empty($route["action"]))
				die("Parse YAML ERROR");
		}
	}





	public function setController($controller){
		$this->controller = ucfirst($controller)."Controller";
	}

	public function setAction($action){
		$this->action = $action."Action";
	}


	public function getController(){
		return $this->controller;
	}

	public function getAction(){
		return $this->action;
	}

	public function exception404(){
		die("Erreur 404");
	}

}
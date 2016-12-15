<?php

class Controller{
	public $view;
	public $model;
	
	function __construct(){
		$this->view = new View();

		$viewPath = strtolower(get_called_class());
		$viewPath = str_replace('controller','',$viewPath);
		$this->view->setViewPath($viewPath);
	}
}
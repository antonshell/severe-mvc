<?php

class IndexController extends Controller{

	function __construct(){
		parent::__construct();
	}

	function index(){
		$data['title'] = "Главная";
		$data['content'] = "Какой-нибудь текст";
		$this->view->generatePage('index',$data);
	}
}
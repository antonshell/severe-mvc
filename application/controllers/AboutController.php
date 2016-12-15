<?php

class AboutController extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		$data['title'] = "О компании";
		$data['content'] = "Какой-нибудь текст";
		$this->view->generatePage('index',$data); //@TODO
	}

	function history($param1 = null,$param2 = null,$param3 = null){
		$data['title'] = "О компании - История";
		$data['content'] = "Какой-нибудь текст";
		$this->view->generatePage('history',$data);
	}
}
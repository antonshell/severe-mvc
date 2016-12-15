<?php

class ContactsController extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		$data['title'] = "Контакты";
		$data['content'] = "Какой-нибудь текст";
		$this->view->generatePage('index',$data);
	}
	
	function scheme(){
		$data['title'] = "Контакты - Схема";
		$data['content'] = "Какой-нибудь текст";
		$this->view->generatePage('scheme',$data);
	}
}
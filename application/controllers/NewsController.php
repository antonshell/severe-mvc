<?php

class NewsController extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		$data['title'] = "Новости";
		$data['content'] = "Какой-нибудь текст";
		$this->view->generatePage('index',$data); //@TODO
	}

	function load($limit = 10,$offset = 0){
		$service = new NewsService();

		$total = count($service->getItems());
		$news = $service->getItems('','',$limit,$offset);

		$result = [
			'total' => $total,
			'data' => $news,
		];

		echo json_encode($result);
		die();
	}
}
<?php

/**
 * Class View
 */
class View{
	private $mainTemplate = 'template.php';
	private $defaultView = 'index.php';
	private $viewPath = 'index';

	/**
	 * @param null $contentView
	 * @param null $data
	 */
	function generatePage($contentView = null,$data = null){
		$templateView = $this->mainTemplate;

		$contentView = ($contentView) ? $contentView . '.php' : $this->defaultView;
		$contentViewPath = 'application/views/' . $this->viewPath . '/' . $contentView;

		extract($data,EXTR_SKIP);

		$jsPath = BASE_URL . "/js/";
		$cssPath = BASE_URL . "/css/";
		$imagePath = BASE_URL . "/images/";
		$libPath = BASE_URL . "/libs/";

		header('Content-Type: text/html; charset=utf-8');
		require_once("application/views/layout/".$templateView);
	}

	/**
	 * @param $templateView
	 */
	public function setTemplate($templateView){
		$this->mainTemplate = $templateView;
	}

	/**
	 * @param $path
	 */
	public function setViewPath($path){
		$this->viewPath = $path;
	}

	/**
	 * @param $errorCode
	 */
	static function generateErrorPage($errorCode){
		$data['content'] = $errorCode;
		$template = "template.php";

		$jsPath = BASE_URL . "/js/";
		$cssPath = BASE_URL . "/css/";
		$imagePath = BASE_URL . "/images/";
		$libPath = BASE_URL . "/libs/";

		$contentViewPath = 'application/views/layout/includes/error.php';
		header('Content-Type: text/html; charset=utf-8');
		require_once("application/views/layout/".$template);
	}
}
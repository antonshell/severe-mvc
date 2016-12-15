<?php
class Router{
	private $url;
	private $aUrl;

	function __construct(){
		$this->getUrl();
		$this->parseUrl();
	}
	
	function getUrl(){
		$url = $_SERVER['REQUEST_URI'];
		$this->url = $url;
	}
	
	function parseUrl(){
		$url = $this->url;
		$self = $_SERVER['PHP_SELF'];
		
		$i=0;
		
		for(;;){
			if(isset($url[$i]) && isset($self[$i])){
				if($url["$i"] == $self["$i"])
				$i++;
				else break;
			}
			else break;
			
		}
		
		$resUrl = substr($url,$i);
		
		$aUrl = explode("/",$resUrl);
		$this->aUrl = $aUrl;
	}
	
	function run(){
		$aUrl = $this->aUrl;
	
        $controllerName = "Index"; //@TODO
        $methodName = "index";
	
        if(!empty($aUrl[0])){
            $controllerName = $aUrl[0];
			$controllerName = ucfirst($controllerName);
        }

        if(!empty($aUrl[1])){
            $methodName = $aUrl[1];
        }
		
        $modelName = $controllerName; //@TODO

		$controllerName .= 'Controller';

		$controllerPath = "application/controllers/".$controllerName.".php"; //@TODO

        if(file_exists($controllerPath)){
			$controller = new $controllerName;

			if(method_exists($controller,$methodName)){
				$params = array();
				
				$i = 2;
				while(!empty($aUrl[$i])){
					$params[] = $aUrl[$i];
					$i++;
				}
				
				call_user_func_array(array($controller,"$methodName"), $params);
			}
			else{
				Router::errorPage404();
			}
        }
        else{
            Router::errorPage404();
        }
	}

    function errorPage404(){
        //error404
		header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
		
		$data['content'] = "404";
		View::generateErrorPage("404");
		echo "404";
    }
}
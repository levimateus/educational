<?php
namespace Core;

use Src\Controllers as Controllers;

class Route
{
	private $uri;

	function __construct($uri = null){
		if(isset($uri)){
			$this->uri = $uri;
		}else {
			if (array_key_exists('url', $_GET)) {
			$this->uri = '/'.$_GET['url'];
			} else {
				$this->uri = '/';
			}
		}
	}

	public function get($uri, $controller, $method = null){
		if ($this->uri == $uri) {

			$requestUri = explode('/', $this->uri);
			$uri = explode('/', $uri);

			$loaded = $this->loadController($controller, $method);

			die;
		}
	}

	private function loadController($controller, $method = null){

		if (isset($controller)) {
			$controller = rtrim($controller);

			$file = __DIR__.'/../src/controllers/'.$controller.'.php';
			$class = '\\Src\\Controllers\\'.$controller;

			if (file_exists($file) && class_exists($class)) {
 
				if (isset($method)) {
					if (method_exists($class, $method)){
						return call_user_func(array($class, $method));
					} else {
						$this->internalServerErrorHttpStatus();
						return null;
					}
				} else {
					return call_user_func(array($class, 'index'));
				}

			} else {
				$this->internalServerErrorHttpStatus();
				return null;
			}
		}	
	}

	public function notFoundHttpStatus(){
		header("HTTP/1.0 404 Not Found");
	}

	public function internalServerErrorHttpStatus(){
		header('HTTP/1.1 500 Internal Server Error');
	}
}
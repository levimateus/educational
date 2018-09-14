<?php
namespace Core;

use Src\Controllers as Controllers;

abstract class Route
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

	protected function call($uri, $controller, $method = null){
			$requestUri = explode('-', $this->uri);

		if ($requestUri[0] == $uri) {

			$argument = isset($requestUri[1]) ? $requestUri[1] : null;
			
			$loaded = $this->loadController($controller, $method, $argument);
			exit();
		}
	}

	protected function loadController($controller, $method = null, $argument = null){
		if (isset($controller)) {
			$controller = rtrim($controller);

			$file = PROJECT_CONTROLLERS_DIR.$controller.'.php';
			$class = '\\Src\\Controllers\\'.$controller;

			if (file_exists($file) && class_exists($class)) {
				if (isset($method)) {
					return $this->callControllerMethod($class, $method, $argument);
				} else {
					return $this->callControllerMethod($class, 'index', $argument);
				}
			} else {
				return $this->internalServerErrorHttpStatus();
			}
		}	
	}

	protected function notFoundHttpStatus(){
		header("HTTP/1.0 404 Not Found");
		exit();
	}

	protected function internalServerErrorHttpStatus(){
		header('HTTP/1.1 500 Internal Server Error');
		exit();
	}

	protected function callControllerMethod($class, $method, $argument = null){
		if (method_exists($class, $method)){
			$object = new $class;
			return call_user_func(array($object, $method), $argument);
		} else {
			$this->internalServerErrorHttpStatus();
		}
	}
}
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

	public function call($uri, $controller, $method = null){
		if ($this->uri == $uri) {
			$requestUri = explode('/', $this->uri);
			$uri = explode('/', $uri);
			
			$loaded = $this->loadController($controller, $method);
			exit();
		}
	}

	private function loadController($controller, $method = null){
		if (isset($controller)) {
			$controller = rtrim($controller);

			$file = PROJECT_CONTROLLERS_DIR.$controller.'.php';
			$class = '\\Src\\Controllers\\'.$controller;

			if (file_exists($file) && class_exists($class)) {
				if (isset($method)) {
					return $this->callControllerMethod($class, $method);
				} else {
					return $this->callControllerMethod($class, 'index');
				}
			} else {
				return $this->internalServerErrorHttpStatus();
			}
		}	
	}

	public function notFoundHttpStatus(){
		header("HTTP/1.0 404 Not Found");
		return null;
	}

	public function internalServerErrorHttpStatus(){
		header('HTTP/1.1 500 Internal Server Error');
		return null;
	}

	public function callControllerMethod($class, $method){
		if (method_exists($class, $method)){
			$object = new $class;
			return call_user_func(array($object, $method));
		} else {
			$this->internalServerErrorHttpStatus();
			return null;
		}
	}
}